import scrapy
from scrapy.spidermiddlewares.httperror import HttpError
from twisted.internet.error import DNSLookupError
from twisted.internet.error import TimeoutError, TCPTimedOutError
import json

class QuotesSpider(scrapy.Spider):
    name = "bgg"
    start_urls = ["https://boardgamegeek.com/browse/boardgame/page/1"]
    # https://boardgamegeek.com/search/boardgame/page/3?advsearch=1&range[yearpublished][min]=2017&range[yearpublished][max]=2017&B1=Submit
    count = 1
    def parse(self, response):
        for href in response.css('.collection_objectname a::attr(href)'):
            yield response.follow(href, callback=self.parse_detail, errback=self.errback_httpbin,)

        for href in response.css("p[align=right] a[title='next page']::attr(href)"):
            yield response.follow(href, callback=self.parse, errback=self.errback_httpbin,)

    def errback_httpbin(self, failure):
        self.logger.error(repr(failure))
        if failure.check(HttpError):
            response = failure.value.response
            self.logger.error('HttpError on %s', response.url)

        elif failure.check(DNSLookupError):
            request = failure.request
            self.logger.error('DNSLookupError on %s', request.url)

        elif failure.check(TimeoutError, TCPTimedOutError):
            request = failure.request
            self.logger.error('TimeoutError on %s', request.url)

    def parse_preloaded_script(self, sc):
        for line in sc.split(";\n"):
            sp = line.strip().split(" = ")
            key = sp[0].strip()
            if (key=="GEEK.geekitemPreload"):
                obj = json.loads(sp[1].strip())
                obj["media"] = None
                obj["videogalleries"] = None
                obj["item"]["itemdata"] = None
                obj["item"]["relatedlinktypes"] = None
                obj["item"]["wiki"] = None
                return obj
        return json.loads("{}")

    def parse_detail(self, response):
        def extract_with_css(query):
            return response.css(query).extract_first().strip()
        try:
            preData = self.parse_preloaded_script(response.css("script::text").extract_first())
            o = {
                "url": response.url,
                "title": extract_with_css('meta[property="og:title"]::attr("content")'),
                "image": extract_with_css('meta[property="og:image"]::attr("content")'),
                "url": extract_with_css('meta[property="og:url"]::attr("content")'),
                "description": extract_with_css('meta[property="og:description"]::attr("content")'),
                "data": preData
            }
        except Exception as inst:
            o = {"url": response.url}

        yield o

    # def parse(self, response):
    #     for quote in response.css('div.quote'):
    #         yield {
    #             'text': quote.css('span.text::text').extract_first(),
    #             'author': quote.css('small.author::text').extract_first(),
    #             'tags': quote.css('div.tags a.tag::text').extract(),
    #         }

    #     next_page = response.css('li.next a::attr(href)').extract_first()
    #     if next_page is not None:
    #         next_page = response.urljoin(next_page)
    #         yield scrapy.Request(next_page, callback=self.parse)
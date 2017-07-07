/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


(function() {
    var c = function(a) {
        for (var b = 0; b < Array.prototype.slice.call(arguments, 1).length; b++) {
            var d, c = Array.prototype.slice.call(arguments, 1)[b];
            for (d in c)
                c.hasOwnProperty(d) && (a[d] = c[d])
        }
        return a
    };
    Function.prototype.bind || (Function.prototype.bind = function(a) {
        var b = [].slice.call(arguments, 1), d = this, c = function() {
        }, f = function() {
            return d.apply(this instanceof c ? this : a || {}, b.concat([].slice.call(arguments)))
        };
        c.prototype = d.prototype;
        f.prototype = new c;
        return f
    });
    var g, f;
    "classList"in document.createElement("input") ?
            (g = function(a, b) {
                a.classList.add(b)
            }, f = function(a, b) {
                a.classList.remove(b)
            }) : (String.prototype.trim || (String.prototype.trim = function(a) {
        return a.replace(/(^\s*|\s*$)/g, "")
    }), g = function(a, b) {
        a.className = (a.className + " " + b).trim()
    }, f = function(a, b) {
        a.className = a.className.replace(RegExp("(^|\\s+)" + b + "(\\s+|$)"), " ").trim()
    });
    var a = function(a) {
        for (var b = document.cookie.split(";"), d = 0; d < b.length; d++) {
            var c = b[d].substr(0, b[d].indexOf("=")), f = b[d].substr(b[d].indexOf("=") + 1), c = c.replace(/^\s+|\s+$/g, "");
            if (c == a)
                return decodeURIComponent(f)
        }
        return null
    }, b = function(a, b, d) {
        var c = new Date;
        c.setDate(c.getDate() + d);
        b = encodeURIComponent(b) + (d == null ? "" : "; expires=" + c.toUTCString());
        document.cookie = a + "=" + b + "; path=/;"
    }, d = {android: {appMeta: "google-play-app", iconRels: ["android-touch-icon", "apple-touch-icon-precomposed", "apple-touch-icon"], getStoreLink: function() {
                return"market://details?id=" + this.appId
            }}}, l = function(b) {
        var f = navigator.userAgent;
        this.options = c({}, {daysHidden: 15, daysReminder: 90, appStoreLanguage: "ru",
            button: "VIEW", store: {ios: "On the App Store", android: "In Google Play"}, price: {ios: "FREE", android: "FREE"}, force: false}, b || {});
        if (this.options.force)
            this.type = this.options.force;
        else if (f.match(/iPad|iPhone|iPod/i) !== null) {
            if (f.match(/Safari/i) !== null && (f.match(/CriOS/i) !== null || window.Number(f.substr(f.indexOf("OS ") + 3, 3).replace("_", ".")) < 6))
                this.type = "ios"
        } else if (f.match(/Android/i) !== null)
            this.type = "android";
        if (this.type && !navigator.standalone && !a("smartbanner-closed") && !a("smartbanner-installed")) {
            c(this,
                    d[this.type]);
            if (this.parseAppId()) {
                this.create();
                this.show()
            }
        }
    };
    l.prototype = {constructor: l, create: function() {
            var a = this.getStoreLink(), b = this.options.price[this.type] + " - " + this.options.store[this.type];
            this.options.price[this.type] == "" && this.options.store[this.type] == "" && (b = "");
            for (var d, c = 0; c < this.iconRels.length; c++) {
                var f = document.documentElement.querySelector('link[rel="' + this.iconRels[c] + '"]');
                if (f) {
                    d = f.getAttribute("href");
                    break
                }
            }
            c = document.createElement("div");
            g(c, "smartbanner");
            g(c, "smartbanner_" +
                    this.type);
            c.innerHTML = '<div class="smartbanner__container"><a href="javascript:void(0);" class="smartbanner__close">&times;</a><span class="smartbanner__icon" style="background-image: url(' + d + ')"></span><div class="smartbanner__info"><div class="smartbanner__title">' + this.options.title + "</div><div>" + this.options.author + "</div><span>" + b + '</span></div><a href="' + a + '" class="button submit-button">' + this.options.button + "</a></div>";
            document.body.appendChild(c);
            (c || document.documentElement).querySelector(".smartbanner__container .button").addEventListener("click",
                    this.install.bind(this), false);
            (c || document.documentElement).querySelector(".smartbanner__close").addEventListener("click", this.close.bind(this), false)
        }, hide: function() {
            f(document.documentElement, "smartbanner_show")
        }, show: function() {
            g(document.documentElement, "smartbanner_show")
        }, close: function() {
            this.hide();
            b("smartbanner-closed", "true", this.options.daysHidden)
        }, install: function() {
            this.hide();
            b("smartbanner-installed", "true", this.options.daysReminder)
        }, parseAppId: function() {
            var a = document.documentElement.querySelector('meta[name="' +
                    this.appMeta + '"]');
            if (a)
                return this.appId = /app-id=([^\s,]+)/.exec(a.getAttribute("content"))[1]
        }};
    window.SmartBanner = l
})();
$("html").hasClass("ie8") || (window.matchMedia = window.matchMedia || function(c) {
    var g, f = c.documentElement, a = f.firstElementChild || f.firstChild, b = c.createElement("body"), d = c.createElement("div");
    d.id = "mq-test-1";
    d.style.cssText = "position:absolute;top:-100em";
    b.appendChild(d);
    return function(c) {
        d.innerHTML = '&shy;<style media="' + c + '"> #mq-test-1 { width: 42px; }</style>';
        f.insertBefore(b, a);
        g = 42 == d.offsetWidth;
        f.removeChild(b);
        return{matches: g, media: c}
    }
}(document));
$("html").hasClass("ie8") || function(c) {
    function g(c) {
        c = c.getBoundingClientRect();
        return(c.top >= 0 || c.bottom >= 0) && (c.left >= 0 || c.right >= 0) && (c.top <= (window.innerHeight || document.documentElement.clientHeight) || c.bottom <= (window.innerHeight || document.documentElement.clientHeight))
    }
    c.types = {};
    c.picturedetect = function() {
        var f = document.createElement("div");
        f.innerHTML = "<svg/>";
        (f.firstChild && f.firstChild.namespaceURI) == "http://www.w3.org/2000/svg" && (c.types["image/svg+xml"] = true);
        var a = new Image;
        a.onload =
                function() {
                    a.width == 1 && (c.types["image/webp"] = true)
                };
        a.src = "data:image/webp;base64,UklGRiwAAABXRUJQVlA4ICAAAAAUAgCdASoBAAEAL/3+/3+CAB/AAAFzrNsAAP5QAAAAAA==";
        setTimeout(c.picturefill, 100)
    };
    c.picturescroll = function() {
        for (var f = c.document.getElementsByTagName("span"), a = 0, b = f.length; a < b; a++)
            if (f[a].getAttribute("data-picture") !== null && f[a].getAttribute("data-postpone") !== null && (f[a].className !== "" && /(^|\s)loaded(\s|$)/.test(f[a].className) === false || f[a].className === "") && g(f[a])) {
                c.picturefill();
                break
            }
    };
    c.picturefill = function() {
        for (var f = c.document.getElementsByTagName("span"), a = 0, b = f.length; a < b; a++)
            if (f[a].getAttribute("data-picture") !== null && (f[a].getAttribute("data-postpone") === null || g(f[a]))) {
                for (var d = f[a].getElementsByTagName("span"), l = [], h, k = 0, m = d.length; k < m; k++) {
                    var i = d[k].getAttribute("data-media"), n = d[k].getAttribute("data-type");
                    if (l.length && n != h)
                        break;
                    if (!n || c.types[n] === true)
                        (!i || c.matchMedia && c.matchMedia(i).matches) && l.push(d[k]);
                    h = n
                }
                d = f[a].getElementsByTagName("img")[0];
                if (l.length) {
                    l =
                            l.pop();
                    k = "srcset"in c.picturefill && c.picturefill.srcset(l);
                    if (!d || d.parentNode.nodeName === "NOSCRIPT") {
                        d = c.document.createElement("img");
                        d.alt = f[a].getAttribute("data-alt");
                        d.className = f[a].getAttribute("data-class")
                    } else if (l === d.parentNode)
                        continue;
                    d.setAttribute("data-original", k || l.getAttribute("data-src"));
                    l.appendChild(d);
                    $(window).trigger("TNZ.Image.Ready", {imageURL: $(d).attr("data-original")});
                    d.removeAttribute("width");
                    d.removeAttribute("height");
                    d.addEventListener ? d.parentNode.parentNode.className =
                            d.parentNode.parentNode.className + " loaded" : d.attachEvent && d.attachEvent("onload", function() {
                                this.parentNode.parentNode.className = this.parentNode.parentNode.className + " loaded"
                            })
                } else
                    d && d.parentNode.removeChild(d)
            }
    };
    if (c.addEventListener) {
        c.addEventListener("resize", c.picturefill, false);
        c.addEventListener("DOMContentLoaded", function() {
            c.picturedetect();
            c.removeEventListener("load", c.picturedetect, false)
        }, false);
        c.addEventListener("load", c.picturedetect, false);
        c.addEventListener("scroll", c.picturescroll,
                false)
    } else if (c.attachEvent) {
        c.attachEvent("onload", c.picturedetect);
        c.attachEvent("onscroll", c.picturescroll)
    }
    $(window).on("runPictureFill", function() {
        c.picturedetect()
    })
}(this);
$("html").hasClass("ie8") || function(c) {
    c.picturefill.srcset = function(g) {
        var f = "srcset"in document.createElement("img"), a = g.getAttribute("data-srcset"), g = c.devicePixelRatio || 1, b = 1, d;
        c.picturefill.srcset.supported = f;
        if (a) {
            if (f)
                return a;
            f = a.split(",");
            for (a = f.length - 1; a >= 0; a--) {
                var l = f[a].replace(/^\s*/, "").replace(/\s*$/, "").split(" "), h = parseFloat(l[1], 10);
                if (h >= g && (h <= b || b == 1)) {
                    d = l[0];
                    b = h
                }
            }
            return d
        }
    }
}(this);
(function(c) {
    c(document).on("click", ".deals-tablet-button", function() {
        function g(a, b) {
            a.addClass("selected");
            b.addClass("showing-mobile-deal")
        }
        function f(a, b) {
            a.removeClass("selected");
            b.removeClass("showing-mobile-deal")
        }
        function a() {
            c(".deals-tablet-button").removeClass("selected");
            c(".carousel.flexslider").removeClass("showing-mobile-deal")
        }
        function b() {
            j = o = n = i = m = k = 0;
            p = e = null
        }
        var d = c(this), l = c(this).parents(".carousel.flexslider"), h = c(".showing-mobile-deal"), k = 0, m = 0, i = 0, n = 0, o = 0, j = 0, e = null, p = null;
        d.hasClass("selected") ? f(d, l) : g(d, l);
        c(document).on("click", ".flex-direction-nav a", function() {
            a()
        });
        c(window).bind("resize", function() {
            a()
        });
        c(document).on("touchstart", h, function(a) {
            c(this);
            k = a.originalEvent.touches.length;
            if (k == 1) {
                m = a.originalEvent.touches[0].pageX;
                i = a.originalEvent.touches[0].pageY
            } else
                b(a)
        });
        c(document).on("touchmove", h, function(a) {
            if (a.originalEvent.touches.length == 1) {
                n = a.originalEvent.touches[0].pageX;
                o = a.originalEvent.touches[0].pageY
            } else
                b(a)
        });
        c(document).on("touchend",
                h, function(c) {
                    if (k == 1 && n != 0) {
                        j = Math.round(Math.sqrt(Math.pow(n - m, 2) + Math.pow(o - i, 2)));
                        if (j >= 72) {
                            var d = m - n, f = o - i;
                            Math.round(Math.sqrt(Math.pow(d, 2) + Math.pow(f, 2)));
                            d = Math.atan2(f, d);
                            e = Math.round(d * 180 / Math.PI);
                            e < 0 && (e = 360 - Math.abs(e));
                            p = e <= 45 && e >= 0 ? "left" : e <= 360 && e >= 315 ? "left" : e >= 135 && e <= 225 ? "right" : e > 45 && e < 135 ? "down" : "up";
                            (p == "left" || p == "right") && a()
                        }
                    }
                    b(c)
                });
        c(document).on("touchcancel", h, function(a) {
            b(a)
        })
    })
})(jQuery);
(function(c) {
    c.flexslider = function(g, f) {
        var a = c(g), b = c.extend({}, c.flexslider.defaults, f), d = b.namespace, l = "ontouchstart"in window || window.DocumentTouch && document instanceof DocumentTouch, h = l ? "touchend" : "click", k = b.direction === "vertical", m = b.reverse, i = b.itemWidth > 0, n = b.animation === "fade", o = b.asNavFor !== "", j = {};
        c.data(g, "flexslider", a);
        j = {init: function() {
                a.animating = false;
                a.currentSlide = b.startAt;
                a.animatingTo = a.currentSlide;
                a.atEnd = a.currentSlide === 0 || a.currentSlide === a.last;
                a.containerSelector = b.selector.substr(0,
                        b.selector.search(" "));
                a.slides = c(b.selector, a);
                a.container = c(a.containerSelector, a);
                a.count = a.slides.length;
                a.syncExists = c(b.sync).length > 0;
                if (b.animation === "slide")
                    b.animation = "swing";
                a.prop = k ? "top" : "marginLeft";
                a.args = {};
                a.manualPause = false;
                a.transitions = !b.video && !n && b.useCSS && function() {
                    var b = document.createElement("div"), c = ["perspectiveProperty", "WebkitPerspective", "MozPerspective", "OPerspective", "msPerspective"], d;
                    for (d in c)
                        if (b.style[c[d]] !== void 0) {
                            a.pfx = c[d].replace("Perspective", "").toLowerCase();
                            a.prop = "-" + a.pfx + "-transform";
                            return true
                        }
                    return false
                }();
                if (b.controlsContainer !== "")
                    a.controlsContainer = c(b.controlsContainer).length > 0 && c(b.controlsContainer);
                if (b.manualControls !== "")
                    a.manualControls = c(b.manualControls).length > 0 && c(b.manualControls);
                if (b.randomize) {
                    a.slides.sort(function() {
                        return Math.round(Math.random()) - 0.5
                    });
                    a.container.empty().append(a.slides)
                }
                a.doMath();
                o && j.asNav.setup();
                a.setup("init");
                b.controlNav && j.controlNav.setup();
                b.directionNav && j.directionNav.setup();
                b.keyboard &&
                        (c(a.containerSelector).length === 1 || b.multipleKeyboard) && c(document).bind("keyup", function(e) {
                    e = e.keyCode;
                    if (!a.animating && (e === 39 || e === 37)) {
                        e = e === 39 ? a.getTarget("next") : e === 37 ? a.getTarget("prev") : false;
                        a.flexAnimate(e, b.pauseOnAction)
                    }
                });
                b.mousewheel && a.bind("mousewheel", function(e, c) {
                    e.preventDefault();
                    var d = c < 0 ? a.getTarget("next") : a.getTarget("prev");
                    a.flexAnimate(d, b.pauseOnAction)
                });
                b.pausePlay && j.pausePlay.setup();
                if (b.slideshow) {
                    b.pauseOnHover && a.hover(function() {
                        !a.manualPlay && !a.manualPause &&
                                a.pause()
                    }, function() {
                        !a.manualPause && !a.manualPlay && a.play()
                    });
                    b.initDelay > 0 ? setTimeout(a.play, b.initDelay) : a.play()
                }
                l && b.touch && j.touch();
                (!n || n && b.smoothHeight) && c(window).bind("resize focus", j.resize);
                setTimeout(function() {
                    b.start(a)
                }, 200)
            }, asNav: {setup: function() {
                    a.asNav = true;
                    a.animatingTo = Math.floor(a.currentSlide / a.move);
                    a.currentItem = a.currentSlide;
                    a.slides.removeClass(d + "active-slide").eq(a.currentItem).addClass(d + "active-slide");
                    a.slides.click(function(e) {
                        e.preventDefault();
                        var e = c(this),
                                d = e.index();
                        if (!c(b.asNavFor).data("flexslider").animating && !e.hasClass("active")) {
                            a.direction = a.currentItem < d ? "next" : "prev";
                            a.flexAnimate(d, b.pauseOnAction, false, true, true)
                        }
                    })
                }}, controlNav: {setup: function() {
                    a.manualControls ? j.controlNav.setupManual() : j.controlNav.setupPaging()
                }, setupPaging: function() {
                    var e = 1, p;
                    a.controlNavScaffold = c('<ol class="' + d + "control-nav " + d + (b.controlNav === "thumbnails" ? "control-thumbs" : "control-paging") + '"></ol>');
                    if (a.pagingCount > 1)
                        for (var f = 0; f < a.pagingCount; f++) {
                            p = b.controlNav ===
                                    "thumbnails" ? '<img src="' + a.slides.eq(f).attr("data-thumb") + '"/>' : "<a>" + e + "</a>";
                            a.controlNavScaffold.append("<li>" + p + "</li>");
                            e++
                        }
                    a.controlsContainer ? c(a.controlsContainer).append(a.controlNavScaffold) : a.append(a.controlNavScaffold);
                    j.controlNav.set();
                    j.controlNav.active();
                    a.controlNavScaffold.delegate("a, img", h, function(e) {
                        e.preventDefault();
                        var e = c(this), p = a.controlNav.index(e);
                        if (!e.hasClass(d + "active")) {
                            a.direction = p > a.currentSlide ? "next" : "prev";
                            a.flexAnimate(p, b.pauseOnAction)
                        }
                    });
                    l && a.controlNavScaffold.delegate("a",
                            "click touchstart", function(a) {
                                a.preventDefault()
                            })
                }, setupManual: function() {
                    a.controlNav = a.manualControls;
                    j.controlNav.active();
                    a.controlNav.live(h, function(e) {
                        e.preventDefault();
                        var e = c(this), p = a.controlNav.index(e);
                        if (!e.hasClass(d + "active")) {
                            p > a.currentSlide ? a.direction = "next" : a.direction = "prev";
                            a.flexAnimate(p, b.pauseOnAction)
                        }
                    });
                    l && a.controlNav.live("click touchstart", function(a) {
                        a.preventDefault()
                    })
                }, set: function() {
                    a.controlNav = c("." + d + "control-nav li " + (b.controlNav === "thumbnails" ? "img" : "a"),
                            a.controlsContainer ? a.controlsContainer : a)
                }, active: function() {
                    a.controlNav.removeClass(d + "active").eq(a.animatingTo).addClass(d + "active")
                }, update: function(b, d) {
                    a.pagingCount > 1 && b === "add" ? a.controlNavScaffold.append(c("<li><a>" + a.count + "</a></li>")) : a.pagingCount === 1 ? a.controlNavScaffold.find("li").remove() : a.controlNav.eq(d).closest("li").remove();
                    j.controlNav.set();
                    a.pagingCount > 1 && a.pagingCount !== a.controlNav.length ? a.update(d, b) : j.controlNav.active()
                }}, directionNav: {setup: function() {
                    var e = c('<ul class="' +
                            d + 'direction-nav"><li><a class="' + d + 'prev" href="#">' + b.prevText + '</a></li><li><a class="' + d + 'next" href="#">' + b.nextText + "</a></li></ul>");
                    if (a.controlsContainer) {
                        c(a.controlsContainer).append(e);
                        a.directionNav = c("." + d + "direction-nav li a", a.controlsContainer)
                    } else {
                        a.append(e);
                        a.directionNav = c("." + d + "direction-nav li a", a)
                    }
                    j.directionNav.update();
                    a.directionNav.bind(h, function(e) {
                        e.preventDefault();
                        e = c(this).hasClass(d + "next") ? a.getTarget("next") : a.getTarget("prev");
                        a.flexAnimate(e, b.pauseOnAction)
                    });
                    l && a.directionNav.bind("click touchstart", function(a) {
                        a.preventDefault()
                    })
                }, update: function() {
                    var e = d + "disabled";
                    a.pagingCount === 1 ? a.directionNav.addClass(e) : b.animationLoop ? a.directionNav.removeClass(e) : a.animatingTo === 0 ? a.directionNav.removeClass(e).filter("." + d + "prev").addClass(e) : a.animatingTo === a.last ? a.directionNav.removeClass(e).filter("." + d + "next").addClass(e) : a.directionNav.removeClass(e)
                }}, pausePlay: {setup: function() {
                    var e = c('<div class="' + d + 'pauseplay"><a></a></div>');
                    if (a.controlsContainer) {
                        a.controlsContainer.append(e);
                        a.pausePlay = c("." + d + "pauseplay a", a.controlsContainer)
                    } else {
                        a.append(e);
                        a.pausePlay = c("." + d + "pauseplay a", a)
                    }
                    j.pausePlay.update(b.slideshow ? d + "pause" : d + "play");
                    a.pausePlay.bind(h, function(b) {
                        b.preventDefault();
                        if (c(this).hasClass(d + "pause")) {
                            a.manualPause = true;
                            a.manualPlay = false;
                            a.pause()
                        } else {
                            a.manualPause = false;
                            a.manualPlay = true;
                            a.play()
                        }
                    });
                    l && a.pausePlay.bind("click touchstart", function(a) {
                        a.preventDefault()
                    })
                }, update: function(e) {
                    e === "play" ? a.pausePlay.removeClass(d + "pause").addClass(d + "play").text(b.playText) :
                            a.pausePlay.removeClass(d + "play").addClass(d + "pause").text(b.pauseText)
                }}, touch: function() {
                function e(e) {
                    h = k ? c - e.touches[0].pageY : c - e.touches[0].pageX;
                    s = k ? Math.abs(h) < Math.abs(e.touches[0].pageX - f) : Math.abs(h) < Math.abs(e.touches[0].pageY - f);
                    if (!s || Number(new Date) - o > 500) {
                        e.preventDefault();
                        if (!n && a.transitions) {
                            b.animationLoop || (h = h / (a.currentSlide === 0 && h < 0 || a.currentSlide === a.last && h > 0 ? Math.abs(h) / j + 2 : 1));
                            a.setProps(l + h, "setTouch")
                        }
                    }
                }
                function d() {
                    g.removeEventListener("touchmove", e, false);
                    if (a.animatingTo ===
                            a.currentSlide && !s && h !== null) {
                        var k = m ? -h : h, i = k > 0 ? a.getTarget("next") : a.getTarget("prev");
                        a.canAdvance(i) && (Number(new Date) - o < 550 && Math.abs(k) > 50 || Math.abs(k) > j / 2) ? a.flexAnimate(i, b.pauseOnAction) : n || a.flexAnimate(a.currentSlide, b.pauseOnAction, true)
                    }
                    g.removeEventListener("touchend", d, false);
                    l = h = f = c = null
                }
                var c, f, l, j, h, o, s = false;
                g.addEventListener("touchstart", function(h) {
                    if (a.animating)
                        h.preventDefault();
                    else if (h.touches.length === 1) {
                        a.pause();
                        j = k ? a.h : a.w;
                        o = Number(new Date);
                        l = i && m && a.animatingTo ===
                                a.last ? 0 : i && m ? a.limit - (a.itemW + b.itemMargin) * a.move * a.animatingTo : i && a.currentSlide === a.last ? a.limit : i ? (a.itemW + b.itemMargin) * a.move * a.currentSlide : m ? (a.last - a.currentSlide + a.cloneOffset) * j : (a.currentSlide + a.cloneOffset) * j;
                        c = k ? h.touches[0].pageY : h.touches[0].pageX;
                        f = k ? h.touches[0].pageX : h.touches[0].pageY;
                        g.addEventListener("touchmove", e, false);
                        g.addEventListener("touchend", d, false)
                    }
                }, false)
            }, resize: function() {
                if (!a.animating && a.is(":visible")) {
                    i || a.doMath();
                    if (n)
                        j.smoothHeight();
                    else if (i) {
                        a.slides.width(a.computedW);
                        a.update(a.pagingCount);
                        a.setProps()
                    } else if (k) {
                        a.viewport.height(a.h);
                        a.setProps(a.h, "setTotal")
                    } else {
                        b.smoothHeight && j.smoothHeight();
                        a.newSlides.width(a.computedW);
                        a.setProps(a.computedW, "setTotal")
                    }
                }
            }, smoothHeight: function(b) {
                if (!k || n) {
                    var d = n ? a : a.viewport;
                    b ? d.animate({height: a.slides.eq(a.animatingTo).height()}, b) : d.height(a.slides.eq(a.animatingTo).height())
                }
            }, sync: function(e) {
                var d = c(b.sync).data("flexslider"), f = a.animatingTo;
                switch (e) {
                    case "animate":
                        d.flexAnimate(f, b.pauseOnAction, false, true);
                        break;
                    case "play":
                        !d.playing && !d.asNav && d.play();
                        break;
                    case "pause":
                        d.pause()
                    }
            }};
        a.flexAnimate = function(e, f, g, h, r) {
            if (o && a.pagingCount === 1)
                a.direction = a.currentItem < e ? "next" : "prev";
            if (!a.animating && (a.canAdvance(e, r) || g) && a.is(":visible")) {
                if (o && h) {
                    g = c(b.asNavFor).data("flexslider");
                    a.atEnd = e === 0 || e === a.count - 1;
                    g.flexAnimate(e, true, false, true, r);
                    a.direction = a.currentItem < e ? "next" : "prev";
                    g.direction = a.direction;
                    if (Math.ceil((e + 1) / a.visible) - 1 !== a.currentSlide && e !== 0) {
                        a.currentItem = e;
                        a.slides.removeClass(d +
                                "active-slide").eq(e).addClass(d + "active-slide");
                        e = Math.floor(e / a.visible)
                    } else {
                        a.currentItem = e;
                        a.slides.removeClass(d + "active-slide").eq(e).addClass(d + "active-slide");
                        return false
                    }
                }
                a.animating = !(e === 0 && e === a.animatingTo);
                a.animatingTo = e;
                b.before(a);
                f && a.pause();
                a.syncExists && !r && j.sync("animate");
                b.controlNav && j.controlNav.active();
                i || a.slides.removeClass(d + "active-slide").eq(e).addClass(d + "active-slide");
                a.atEnd = e === 0 || e === a.last;
                b.directionNav && j.directionNav.update();
                if (e === a.last) {
                    b.end(a);
                    b.animationLoop ||
                            a.pause()
                }
                if (n)
                    if (l) {
                        a.slides.eq(a.currentSlide).css({opacity: 0});
                        a.slides.eq(e).css({opacity: 1});
                        a.animating = false;
                        a.currentSlide = a.animatingTo
                    } else {
                        a.slides.eq(a.currentSlide).fadeOut(b.animationSpeed, b.easing);
                        a.slides.eq(e).fadeIn(b.animationSpeed, b.easing, a.wrapup)
                    }
                else {
                    var q = k ? a.slides.filter(":first").height() : a.computedW;
                    if (i) {
                        e = b.itemWidth > a.w ? b.itemMargin * 2 : b.itemMargin;
                        e = (a.itemW + e) * a.move * a.animatingTo;
                        e = e > a.limit && a.visible !== 1 ? a.limit : e
                    } else
                        e = a.currentSlide === 0 && e === a.count - 1 && b.animationLoop &&
                                a.direction !== "next" ? m ? (a.count + a.cloneOffset) * q : 0 : a.currentSlide === a.last && e === 0 && b.animationLoop && a.direction !== "prev" ? m ? 0 : (a.count + 1) * q : m ? (a.count - 1 - e + a.cloneOffset) * q : (e + a.cloneOffset) * q;
                    a.setProps(e, "", b.animationSpeed);
                    if (a.transitions) {
                        if (!b.animationLoop || !a.atEnd) {
                            a.animating = false;
                            a.currentSlide = a.animatingTo
                        }
                        a.container.unbind("webkitTransitionEnd transitionend");
                        a.container.bind("webkitTransitionEnd transitionend", function() {
                            a.wrapup(q)
                        })
                    } else
                        a.container.animate(a.args, b.animationSpeed,
                                b.easing, function() {
                                    a.wrapup(q)
                                })
                }
                b.smoothHeight && j.smoothHeight(b.animationSpeed)
            }
        };
        a.wrapup = function(e) {
            !n && !i && (a.currentSlide === 0 && a.animatingTo === a.last && b.animationLoop ? a.setProps(e, "jumpEnd") : a.currentSlide === a.last && (a.animatingTo === 0 && b.animationLoop) && a.setProps(e, "jumpStart"));
            a.animating = false;
            a.currentSlide = a.animatingTo;
            b.after(a)
        };
        a.animateSlides = function() {
            a.animating || a.flexAnimate(a.getTarget("next"))
        };
        a.pause = function() {
            clearInterval(a.animatedSlides);
            a.playing = false;
            b.pausePlay &&
                    j.pausePlay.update("play");
            a.syncExists && j.sync("pause")
        };
        a.play = function() {
            a.animatedSlides = setInterval(a.animateSlides, b.slideshowSpeed);
            a.playing = true;
            b.pausePlay && j.pausePlay.update("pause");
            a.syncExists && j.sync("play")
        };
        a.canAdvance = function(e, d) {
            var c = o ? a.pagingCount - 1 : a.last;
            return d ? true : o && a.currentItem === a.count - 1 && e === 0 && a.direction === "prev" ? true : o && a.currentItem === 0 && e === a.pagingCount - 1 && a.direction !== "next" ? false : e === a.currentSlide && !o ? false : b.animationLoop ? true : a.atEnd && a.currentSlide ===
                    0 && e === c && a.direction !== "next" ? false : a.atEnd && a.currentSlide === c && e === 0 && a.direction === "next" ? false : true
        };
        a.getTarget = function(b) {
            a.direction = b;
            return b === "next" ? a.currentSlide === a.last ? 0 : a.currentSlide + 1 : a.currentSlide === 0 ? a.last : a.currentSlide - 1
        };
        a.setProps = function(d, c, f) {
            var g = function() {
                var f = d ? d : (a.itemW + b.itemMargin) * a.move * a.animatingTo;
                return function() {
                    if (i)
                        return c === "setTouch" ? d : m && a.animatingTo === a.last ? 0 : m ? a.limit - (a.itemW + b.itemMargin) * a.move * a.animatingTo : a.animatingTo === a.last ? a.limit :
                                f;
                    switch (c) {
                        case "setTotal":
                            return m ? (a.count - 1 - a.currentSlide + a.cloneOffset) * d : (a.currentSlide + a.cloneOffset) * d;
                        case "setTouch":
                            return d;
                        case "jumpEnd":
                            return m ? d : a.count * d;
                        case "jumpStart":
                            return m ? a.count * d : d;
                        default:
                            return d
                        }
                }() * -1 + "px"
            }();
            if (a.transitions) {
                g = k ? "translate3d(0," + g + ",0)" : "translate3d(" + g + ",0,0)";
                f = f !== void 0 ? f / 1E3 + "s" : "0s";
                a.container.css("-" + a.pfx + "-transition-duration", f)
            }
            a.args[a.prop] = g;
            (a.transitions || f === void 0) && a.container.css(a.args)
        };
        a.setup = function(e) {
            if (n) {
                a.slides.css({width: "100%",
                    "float": "left", marginRight: "-100%", position: "relative"});
                e === "init" && (l ? a.slides.css({opacity: 0, display: "block", webkitTransition: "opacity " + b.animationSpeed / 1E3 + "s ease"}).eq(a.currentSlide).css({opacity: 1}) : a.slides.eq(a.currentSlide).fadeIn(b.animationSpeed, b.easing));
                b.smoothHeight && j.smoothHeight()
            } else {
                var f, g;
                if (e === "init") {
                    a.viewport = c('<div class="' + d + 'viewport"></div>').css({overflow: "hidden", position: "relative"}).appendTo(a).append(a.container);
                    a.cloneCount = 0;
                    a.cloneOffset = 0;
                    if (m) {
                        g = c.makeArray(a.slides).reverse();
                        a.slides = c(g);
                        a.container.empty().append(a.slides)
                    }
                }
                if (b.animationLoop && !i) {
                    a.cloneCount = 2;
                    a.cloneOffset = 1;
                    e !== "init" && a.container.find(".clone").remove();
                    a.container.append(a.slides.first().clone().addClass("clone")).prepend(a.slides.last().clone().addClass("clone"))
                }
                a.newSlides = c(b.selector, a);
                f = m ? a.count - 1 - a.currentSlide + a.cloneOffset : a.currentSlide + a.cloneOffset;
                if (k && !i) {
                    a.container.height((a.count + a.cloneCount) * 200 + "%").css("position", "absolute").width("100%");
                    setTimeout(function() {
                        a.newSlides.css({display: "block"});
                        a.doMath();
                        a.viewport.height(a.h);
                        a.setProps(f * a.h, "init")
                    }, e === "init" ? 100 : 0)
                } else {
                    a.container.width((a.count + a.cloneCount) * 200 + "%");
                    a.setProps(f * a.computedW, "init");
                    setTimeout(function() {
                        a.doMath();
                        a.newSlides.css({width: a.computedW, "float": "left", display: "block"});
                        b.smoothHeight && j.smoothHeight()
                    }, e === "init" ? 100 : 0)
                }
            }
            i || a.slides.removeClass(d + "active-slide").eq(a.currentSlide).addClass(d + "active-slide")
        };
        a.doMath = function() {
            var d = a.slides.first(), c = b.itemMargin, f = b.minItems, g = b.maxItems;
            a.w = a.width();
            a.h = d.height();
            a.boxPadding = d.outerWidth() - d.width();
            if (i) {
                a.itemT = b.itemWidth + c;
                a.minW = f ? f * a.itemT : a.w;
                a.maxW = g ? g * a.itemT : a.w;
                a.itemW = a.minW > a.w ? (a.w - c * f) / f : a.maxW < a.w ? (a.w - c * g) / g : b.itemWidth > a.w ? a.w : b.itemWidth;
                a.visible = Math.floor(a.w / (a.itemW + c));
                a.move = b.move > 0 && b.move < a.visible ? b.move : a.visible;
                a.pagingCount = Math.ceil((a.count - a.visible) / a.move + 1);
                a.last = a.pagingCount - 1;
                a.limit = a.pagingCount === 1 ? 0 : b.itemWidth > a.w ? (a.itemW + c * 2) * a.count - a.w - c : (a.itemW + c) * a.count - a.w - c
            } else {
                a.itemW = a.w;
                a.pagingCount =
                        a.count;
                a.last = a.count - 1
            }
            a.computedW = a.itemW - a.boxPadding
        };
        a.update = function(d, c) {
            a.doMath();
            if (!i) {
                if (d < a.currentSlide)
                    a.currentSlide = a.currentSlide + 1;
                else if (d <= a.currentSlide && d !== 0)
                    a.currentSlide = a.currentSlide - 1;
                a.animatingTo = a.currentSlide
            }
            if (b.controlNav && !a.manualControls)
                if (c === "add" && !i || a.pagingCount > a.controlNav.length)
                    j.controlNav.update("add");
                else if (c === "remove" && !i || a.pagingCount < a.controlNav.length) {
                    if (i && a.currentSlide > a.last) {
                        a.currentSlide = a.currentSlide - 1;
                        a.animatingTo = a.animatingTo -
                        1
                    }
                    j.controlNav.update("remove", a.last)
                }
            b.directionNav && j.directionNav.update()
        };
        a.addSlide = function(d, f) {
            var g = c(d);
            a.count = a.count + 1;
            a.last = a.count - 1;
            k && m ? f !== void 0 ? a.slides.eq(a.count - f).after(g) : a.container.prepend(g) : f !== void 0 ? a.slides.eq(f).before(g) : a.container.append(g);
            a.update(f, "add");
            a.slides = c(b.selector + ":not(.clone)", a);
            a.setup();
            b.added(a)
        };
        a.removeSlide = function(d) {
            var f = isNaN(d) ? a.slides.index(c(d)) : d;
            a.count = a.count - 1;
            a.last = a.count - 1;
            isNaN(d) ? c(d, a.slides).remove() : k && m ? a.slides.eq(a.last).remove() :
                    a.slides.eq(d).remove();
            a.doMath();
            a.update(f, "remove");
            a.slides = c(b.selector + ":not(.clone)", a);
            a.setup();
            b.removed(a)
        };
        j.init()
    };
    c.flexslider.defaults = {namespace: "flex-", selector: ".slides > li", animation: "fade", easing: "swing", direction: "horizontal", reverse: false, animationLoop: true, smoothHeight: false, startAt: 0, slideshow: true, slideshowSpeed: 7E3, animationSpeed: 600, initDelay: 0, randomize: false, pauseOnAction: true, pauseOnHover: false, useCSS: true, touch: true, video: false, controlNav: true, directionNav: true, prevText: "Previous",
        nextText: "Next", keyboard: true, multipleKeyboard: false, mousewheel: false, pausePlay: false, pauseText: "Pause", playText: "Play", controlsContainer: "", manualControls: "", sync: "", asNavFor: "", itemWidth: 0, itemMargin: 0, minItems: 0, maxItems: 0, move: 0, start: function() {
        }, before: function() {
        }, after: function() {
        }, end: function() {
        }, added: function() {
        }, removed: function() {
        }};
    c.fn.flexslider = function(g) {
        g === void 0 && (g = {});
        if (typeof g === "object")
            return this.each(function() {
                var a = c(this), b = a.find(g.selector ? g.selector : ".slides > li");
                if (b.length === 1) {
                    b.fadeIn(400);
                    g.start && g.start(a)
                } else
                    a.data("flexslider") === void 0 && new c.flexslider(this, g)
            });
        var f = c(this).data("flexslider");
        switch (g) {
            case "play":
                f.play();
                break;
            case "pause":
                f.pause();
                break;
            case "next":
                f.flexAnimate(f.getTarget("next"), true);
                break;
            case "prev":
            case "previous":
                f.flexAnimate(f.getTarget("prev"), true);
                break;
            default:
                typeof g === "number" && f.flexAnimate(g, true)
            }
    }
})(jQuery);
TNZ = window.TNZ || {};
TNZ.Carousel = function(c, g) {
    var f = $(c), a = this;
    a.loadClones = function() {
        f.find("li.clone").each(function() {
            var a = $(this).find("figure img");
            a.attr("data-original") !== void 0 && a.attr("src") != a.attr("data-original") && a.attr("src", a.attr("data-original"))
        })
    };
    a.lazySwap = function(a, b) {
        var c;
        c = a ? $(a[b]) : f.find("li");
        var g = c.find("figure img");
        g.attr("data-original") !== void 0 && g.attr("src") != g.attr("data-original") && g.hide().attr("src", g.attr("data-original"));
        g.load(function() {
            (b == 0 || b === void 0) && $(this).parents(".carousel").find(".placeholder").remove();
            g.show();
            c.find(".play").show()
        })
    };
    this.options = {slideshow: true, controlsContainer: c + " .controls", animation: "slide", animationSpeed: 600, animationLoop: true, slideshowSpeed: 1E6, pauseOnHover: true, hoverInteracition: false, pullHeaderUp: false, touch: true, video: false, delayInitNextBySpeed: 0, start: function(b) {
            if (f.find(".picture").find("img").length !== 0 || $("html").hasClass("ie8"))
                if (b.slides === void 0)
                    a.lazySwap(void 0, void 0);
                else {
                    a.loadClones();
                    a.lazySwap(b.slides, b.currentSlide);
                    a.lazySwap(b.slides, b.currentSlide +
                            1);
                    a.lazySwap(b.slides, b.slides.length - 1)
                }
            $(window).on("TNZ.Image.Ready", function() {
                if (b.slides === void 0)
                    a.lazySwap(void 0, void 0);
                else {
                    a.loadClones();
                    a.lazySwap(b.slides, b.currentSlide);
                    a.lazySwap(b.slides, b.currentSlide + 1);
                    a.lazySwap(b.slides, b.slides.length - 1)
                }
            });
            if (a.options.hoverInteracition && typeof a.pause != "undefined") {
                a.pause();
                $li = a.slider.parents("li");
                $li.on("mouseenter", function(c) {
                    a.options.delayInitNextBySpeed === 0 ? b.flexAnimate(b.getTarget("next")) : setTimeout(function() {
                        $(c.srcElement).find("a.play:first").is(":hover") ||
                                b.flexAnimate(b.getTarget("next"))
                    }, a.options.delayInitNextBySpeed);
                    a.play()
                }).on("mouseleave", function() {
                    a.pause()
                })
            }
        }, before: function(b) {
            a.lazySwap(b.slides, b.animatingTo)
        }, after: function(b) {
            a.lazySwap(b.slides, b.currentSlide + 1);
            a.lazySwap(b.slides, b.currentSlide - 1)
        }};
    $.extend(this.options, g);
    this.options.controlNav !== true && $.extend(this.options, {controlNav: g.withThumbs ? "thumbnails" : false, directionNav: g.withThumbs ? false : true});
    this.slider = f.flexslider(this.options);
    this.play = function() {
        this.slider.flexslider("play")
    };
    this.pause = function() {
        this.slider.flexslider("pause")
    };
    f.find(".videoplayer").on("click", function(a) {
        a.preventDefault();
        $(this).find(".play").length > 0 && TNZ.Carousel.playVideo(this)
    });
    if (g.withThumbs) {
        var b = f.find(".flex-control-thumbs img");
        f.find(".slides li:not(.clone) img").each(function(a) {
            var c = $(this);
            $(b[a]).attr("src", c.data("thumb"));
            $(b[a]).load(function() {
                $(b[a]).fadeIn()
            })
        })
    }
};
TNZ.Carousel.playVideo = function(c) {
    var g = $(c), c = g.data("video-provider"), g = g.data("video-id");
    switch (c) {
        case TNZ.Carousel.PROVIDER_VIMEO:
            c = [TNZ.Carousel.ENDPOINT_VIMEO, g, "?autoplay=1&title=0&byline=0&portrait=0"].join("");
            break;
        case TNZ.Carousel.PROVIDER_YOUKU:
            c = [TNZ.Carousel.ENDPOINT_YOUKU, g, "/v.swf"].join("");
            break;
        default:
            c = [TNZ.Carousel.ENDPOINT_YOUTUBE, g, "?rel=0&autoplay=1"].join("")
    }
    $.colorbox({href: c, iframe: true, width: "80%", height: "80%"})
};
TNZ.Carousel.PROVIDER_VIMEO = "vimeo";
TNZ.Carousel.PROVIDER_YOUTUBE = "youtube";
TNZ.Carousel.PROVIDER_YOUKU = "youku";
TNZ.Carousel.ENDPOINT_VIMEO = "http://player.vimeo.com/video/";
TNZ.Carousel.ENDPOINT_YOUTUBE = "http://www.youtube.com/embed/";
TNZ.Carousel.ENDPOINT_YOUKU = "http://player.youku.com/player.php/sid/";
TNZ = TNZ || {};
TNZ.PromoTiles = function(c, g) {
    function f(a, c, f, h, k, m, i) {
        var n = !!f.length, o = parseInt(h.css("left")), j = parseInt(h.css("top"));
        h.css({left: o, top: j});
        i.css({opacity: 0});
        c.animate({opacity: 0}, g.timing, function() {
            c.css({height: 268});
            a.data("_timeoutTransitionID", setTimeout(function() {
                c.animate({opacity: 1}, g.timing_2, function() {
                    c.css("opacity", "")
                });
                n && f.delay("200").animate({width: g.max_size, height: g.max_size, left: 17, top: 190, marginLeft: 0, marginTop: 0}, 268, "easeOutCirc");
                i.delay("200").animate({opacity: 1},
                268, "easeOutCirc", function() {
                    i.css("opacity", "")
                });
                var e = g.show_dot_delay;
                n || (e = 100);
                a.data("_showDotID", setTimeout(function() {
                    h.animate({opacity: 1}, 500);
                    k.animate({opacity: 1}, 500);
                    m.animate({opacity: 1}, 500)
                }, e))
            }, g.transition_delay))
        })
    }
    function a(a, c, f, h, k, m, i) {
        a = a.data();
        clearTimeout(a._timeoutTriggerID);
        clearTimeout(a._timeoutTransitionID);
        clearTimeout(a._showDotID);
        a._timeoutTriggerID = void 0;
        a._timeoutTransitionID = void 0;
        a._showDotID = void 0;
        c.stop(true).css({height: "", opacity: ""});
        i.stop(true).css({opacity: ""});
        f.stop(true).css({width: g.min_size, height: g.min_size, left: 17, top: 190, marginLeft: g.max_size / 2, marginTop: g.max_size / 2});
        h.stop(true).css({opacity: ""});
        k.stop(true).css({opacity: ""});
        m.stop(true).css({opacity: ""})
    }
    g = $.extend({timing: 20, timing_2: 300, transition_delay: 50, trigger_delay: 200, arrow_delay: 300, show_dot_delay: 500, min_size: 0, max_size: 140}, g);
    c.each(function() {
        var b = $(this), c = b.find("div.detail"), l = c.find("div.small-nz-location"), h = l.find("span"), k = c.find("span.arrow"), m = c.find("p"), i = c.find("h2");
        b.mouseenter(function() {
            clearTimeout(b.data("_timeoutTriggerID"));
            b.data("_timeoutTriggerID", setTimeout(function() {
                f(b, c, l, h, k, m, i)
            }, g.trigger_delay))
        }).mouseleave(function() {
            a(b, c, l, h, k, m, i)
        });
        k.mouseenter(function() {
            $(this).addClass("hover")
        });
        k.mouseleave(function() {
            $(this).removeClass("hover")
        });
        a(b, c, l, h, k, m, i)
    })
};
$(function() {
    if (!$("html").hasClass(".ie8")) {
        var c = $("#blocks").find("li:not(.block-intro)");
        TNZ.PromoTiles(c)
    }
});
TNZ = window.TNZ || {};
TNZ.DestinationMap = function() {
    var c = $(window), g = $("#destinations-map"), f = false, a = $("#map-popup");
    g.find(".link").click(function() {
        var c = a.data("o_id"), d = $(this), g = d.data();
        g.display_market = TNZ.initialRequestConfig.market;
        if (g.intro_id && !d.hasClass("is-active")) {
            var h = $("#map-intro-vis-" + g.intro_id).html();
            $("#map-intro-vis").fadeOut(250, function() {
                $(this).html(h).fadeIn(250)
            })
        }
        if (g.o_id == -1) {
            a.is(":visible") && a.fadeOut(250);
            a.data("o_id", -1)
        } else if (g.o_id == c)
            a.effect("shake", {times: 3}, 100);
        else {
            $.ajax({url: "/_proxycache240/alacrity/mapbubble/destination/",
                dataType: "json", type: "GET", data: g, cache: true, success: function(b) {
                    if (b.exists) {
                        a.is(":visible");
                        a.html(b.HTML).fadeIn(250);
                        a.data("o_id", g.o_id)
                    }
                    $(window).trigger("TNZ.DestinationMap.Bubble.Loaded")
                }, error: function() {
                }});
            f && b();
            f || (f = true)
        }
    });
    var b = function(a) {
        var b = g.offset().top + 446, d = b + 281 + 30, f = c.scrollTop(), h = f + c.height(), a = a || function() {
        }, i = d - c.height();
        b < f || d > h ? $("body, html").animate({scrollTop: i}, 250, a) : a()
    }, d = $("#map-national-parks"), l = $("#labels-national-parks"), h = "";
    l.find(".link").on("click.nationalParks",
            function(a) {
                a.preventDefault();
                var b = $(this), a = b.closest("li"), b = b.attr("rel"), c = "map-np-" + b + "-off";
                if (!a.hasClass("is-active")) {
                    if (h) {
                        d.find("." + h).removeClass(h);
                        l.find(".is-active").removeClass("is-active")
                    }
                    h = "map-np-" + b + "-on";
                    d.find("." + c).addClass(h);
                    a.addClass("is-active").removeClass("is-hover")
                }
            }).on("hover.nationalParks", function() {
        var a = $(this), b = a.closest("li"), c = a.attr("rel"), a = "map-np-" + c + "-off", c = "map-np-" + c + "-on";
        if (!b.hasClass("is-active")) {
            d.find("." + a).toggleClass(c);
            b.toggleClass("is-hover")
        }
    });
    var k = $("#map-regions"), m = $("#labels-regions"), i = "";
    m.find(".link").on("click.regions", function(a) {
        a.preventDefault();
        var b = $(this), a = b.closest("li"), b = b.attr("rel"), c = "map-reg-" + b + "-off";
        if (!a.hasClass("is-active")) {
            if (i) {
                k.find("." + i).removeClass(i).find(".map-reg-dot-off").removeClass("map-reg-dot-on");
                m.find(".is-active").removeClass("is-active")
            }
            i = "map-reg-" + b + "-on";
            k.find("." + c).addClass(i);
            a.addClass("is-active").removeClass("is-hover")
        }
    }).on("hover.regions", function() {
        var a = $(this), b = a.closest("li"),
                c = a.attr("rel"), a = "map-reg-" + c + "-off", c = "map-reg-" + c + "-on";
        if (!b.hasClass("is-active")) {
            k.find("." + a).toggleClass(c).find(".map-reg-dot-off").toggleClass("map-reg-dot-on");
            b.toggleClass("is-hover")
        }
    });
    var n = $("#map-legend"), o = n.find(".link.is-active"), j = g.find("> div[class$=-wrap]:visible");
    n.find(".link").on("click.legend", function(a) {
        a.preventDefault();
        var a = $(this), b = "#" + a.attr("rel");
        if (!a.hasClass("is-active")) {
            o.length && o.removeClass("is-active");
            o = a.addClass("is-active");
            j.length && j.hide();
            j = $(b).show();
            if (h) {
                d.find("." + h).removeClass(h);
                l.find(".is-active").removeClass("is-active")
            }
            if (i) {
                k.find("." + i).removeClass(i).find(".map-reg-dot-off").removeClass("map-reg-dot-on");
                m.find(".is-active").removeClass("is-active")
            }
        }
    });
    n.find(".legend-regions").find(".link").trigger("click")
};
$(function() {
    TNZ.DestinationMap();
    $("#map-northland-link").click()
});
/*37587 g*//* TNZPRDWEB1 */
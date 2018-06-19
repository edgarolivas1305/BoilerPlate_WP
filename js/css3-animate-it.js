var $ = jQuery;

! function(a) {
    function t() {
        n = !1;
        for (var t = 0; t < i.length; t++) {
            var o = a(i[t]).filter(function() {
                return a(this).is(":appeared")
            });
            if (o.trigger("appear", [o]), e) {
                var d = e.not(o);
                d.trigger("disappear", [d])
            }
            e = o
        }
    }
    var e, i = [],
        o = !1,
        n = !1,
        d = {
            interval: 250,
            force_process: !1
        },
        r = a(window);
    a.expr[":"].appeared = function(t) {
        var e = a(t);
        if (!e.is(":visible")) return !1;
        var i = r.scrollLeft(),
            o = r.scrollTop(),
            n = e.offset(),
            d = n.left,
            s = n.top;
        return s + e.height() >= o && s - (e.data("appear-top-offset") || 0) <= o + r.height() && d + e.width() >= i && d - (e.data("appear-left-offset") || 0) <= i + r.width() ? !0 : !1
    }, a.fn.extend({
        appear: function(e) {
            var r = a.extend({}, d, e || {}),
                s = this.selector || this;
            if (!o) {
                var l = function() {
                    n || (n = !0, setTimeout(t, r.interval))
                };
                a(window).scroll(l).resize(l), o = !0
            }
            return r.force_process && setTimeout(t, r.interval), i.push(s), a(s)
        }
    }), a.extend({
        force_appear: function() {
            return o ? (t(), !0) : !1
        }
    })
}(jQuery),
function(a) {
    "$:nomunge";

    function t(t) {
        function i() {
            t ? d.removeData(t) : c && delete e[c]
        }

        function n() {
            s.id = setTimeout(function() {
                s.fn()
            }, p)
        }
        var d, r = this,
            s = {},
            l = t ? a.fn : a,
            f = arguments,
            u = 4,
            c = f[1],
            p = f[2],
            g = f[3];
        if ("string" != typeof c && (u--, c = t = 0, p = f[1], g = f[2]), t ? (d = r.eq(0), d.data(t, s = d.data(t) || {})) : c && (s = e[c] || (e[c] = {})), s.id && clearTimeout(s.id), delete s.id, g) s.fn = function(a) {
            "string" == typeof g && (g = l[g]), g.apply(r, o.call(f, u)) !== !0 || a ? i() : n()
        }, n();
        else {
            if (s.fn) return void 0 === p ? i() : s.fn(p === !1), !0;
            i()
        }
    }
    var e = {},
        i = "doTimeout",
        o = Array.prototype.slice;
    a[i] = function() {
        return t.apply(window, [0].concat(o.call(arguments)))
    }, a.fn[i] = function() {
        var a = o.call(arguments),
            e = t.apply(this, [i + a[0]].concat(a));
        return "number" == typeof a[0] || "number" == typeof a[1] ? this : e
    }
}(jQuery), $(".animatedParent").appear(), $(".animatedClick").click(function() {
    var a = $(this).attr("data-target");
    if (void 0 != $(this).attr("data-sequence")) {
        var t = $("." + a + ":first").attr("data-id"),
            e = $("." + a + ":last").attr("data-id"),
            i = t;
        $("." + a + "[data-id=" + i + "]").hasClass("go") ? ($("." + a + "[data-id=" + i + "]").addClass("goAway"), $("." + a + "[data-id=" + i + "]").removeClass("go")) : ($("." + a + "[data-id=" + i + "]").addClass("go"), $("." + a + "[data-id=" + i + "]").removeClass("goAway")), i++, delay = Number($(this).attr("data-sequence")), $.doTimeout(delay, function() {
           // return console.log(e), $("." + a + "[data-id=" + i + "]").hasClass("go") ? ($("." + a + "[data-id=" + i + "]").addClass("goAway"), $("." + a + "[data-id=" + i + "]").removeClass("go")) : ($("." + a + "[data-id=" + i + "]").addClass("go"), $("." + a + "[data-id=" + i + "]").removeClass("goAway")), ++i, e >= i ? !0 : void 0
        })
    } else $("." + a).hasClass("go") ? ($("." + a).addClass("goAway"), $("." + a).removeClass("go")) : ($("." + a).addClass("go"), $("." + a).removeClass("goAway"))
}), $(document.body).on("appear", ".animatedParent", function(a, t) {
    var e = $(this).find(".animated"),
        i = $(this);
    if (i, a, t, void 0 != i.attr("data-sequence")) {
        var o = $(this).find(".animated:first").attr("data-id"),
            n = o,
            d = $(this).find(".animated:last").attr("data-id");
        $(i).find(".animated[data-id=" + n + "]").addClass("go"), n++, delay = Number(i.attr("data-sequence")), $.doTimeout(delay, function() {
            return $(i).find(".animated[data-id=" + n + "]").addClass("go"), ++n, d >= n ? !0 : void 0
        })
    } else e.addClass("go")
}), $(window).on("load", function() {
    $.force_appear()
});
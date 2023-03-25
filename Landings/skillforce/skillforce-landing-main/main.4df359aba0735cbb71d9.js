/*! For license information please see main.4df359aba0735cbb71d9.js.LICENSE.txt */
!(function () {
    var t = {
            399: function () {
                var t = document.querySelector(".burger"),
                    e = document.querySelector(".burger__close"),
                    r = document.querySelector(".nav__mobile"),
                    n = r.querySelectorAll("li");
                t.addEventListener("click", function () {
                    r.classList.add("nav__mobile_active"), e.classList.add("burger__close_active");
                }),
                    e.addEventListener("click", function () {
                        r.classList.remove("nav__mobile_active"), e.classList.remove("burger__close_active");
                    }),
                    n.forEach(function (t) {
                        t.addEventListener("click", function () {
                            e.classList.remove("burger__close_active"), r.classList.remove("nav__mobile_active");
                        });
                    });
            },
            475: function () {
                document.addEventListener("DOMContentLoaded", function () {
                    var t = document.querySelectorAll(".open-modal"),
                        e = document.querySelector("#main-modal"),
                        r = document.querySelector("#waiting-modal"),
                        n = !0;
                    t.forEach(function (t) {
                        t.addEventListener("click", function () {
                            document.body.classList.add("no-scroll"), e.showModal();
                        });
                    }),
                        document.querySelectorAll(".modal").forEach(function (t) {
                            t.addEventListener("click", function (e) {
                                (e.target === t || e.target.classList.contains("close-modal")) && (document.body.classList.remove("no-scroll"), t.close());
                            });
                        }),
                        document.addEventListener("mousemove", function (t) {
                            n && t.clientY <= 20 && ((n = !1), document.body.classList.add("no-scroll"), e.showModal());
                        }),
                        setTimeout(function () {
                            return r.showModal();
                        }, 3e5);
                });
            },
            252: function () {
                document.addEventListener("DOMContentLoaded", function () {
                    window.addEventListener("scroll", function () {
                        var t = document.querySelector(".header");
                        window.scrollY >= 200 ? t.classList.add("colorized") : t.classList.remove("colorized");
                    });
                });
            },
            91: function (t) {
                "use strict";
                t.exports = function (t, e) {
                    return e || (e = {}), t ? ((t = String(t.__esModule ? t.default : t)), e.hash && (t += e.hash), e.maybeNeedQuotes && /[\t\n\f\r "'=<>`]/.test(t) ? '"'.concat(t, '"') : t) : t;
                };
            },
            243: function (t, e, r) {
                "use strict";
                t.exports = r.p + "assets/beluga.png";
            },
            587: function (t, e, r) {
                "use strict";
                t.exports = r.p + "assets/gazprom.png";
            },
            409: function (t, e, r) {
                "use strict";
                t.exports = r.p + "assets/rostelekom.png";
            },
            339: function (t, e, r) {
                "use strict";
                t.exports = r.p + "assets/apple-touch-icon.png";
            },
            786: function (t, e, r) {
                "use strict";
                t.exports = r.p + "assets/favicon-16x16.png";
            },
            694: function (t, e, r) {
                "use strict";
                t.exports = r.p + "assets/favicon-32x32.png";
            },
            193: function (t, e, r) {
                "use strict";
                t.exports = r.p + "assets/loading.gif";
            },
            867: function (t, e, r) {
                "use strict";
                t.exports = r.p + "assets/dns.png";
            },
            718: function (t, e, r) {
                "use strict";
                t.exports = r.p + "assets/ponsse.png";
            },
            301: function (t, e, r) {
                "use strict";
                t.exports = r.p + "assets/rostselmash.png";
            },
            314: function (t, e, r) {
                "use strict";
                t.exports = r.p + "assets/tinkoff.png";
            },
            862: function (t, e, r) {
                "use strict";
                t.exports = r.p + "assets/favicon.ico";
            },
            354: function (t, e, r) {
                "use strict";
                t.exports = r.p + "assets/site.webmanifest";
            },
        },
        e = {};
    function r(n) {
        var o = e[n];
        if (void 0 !== o) return o.exports;
        var i = (e[n] = { exports: {} });
        return t[n](i, i.exports, r), i.exports;
    }
    (r.m = t),
        (r.n = function (t) {
            var e =
                t && t.__esModule
                    ? function () {
                          return t.default;
                      }
                    : function () {
                          return t;
                      };
            return r.d(e, { a: e }), e;
        }),
        (r.d = function (t, e) {
            for (var n in e) r.o(e, n) && !r.o(t, n) && Object.defineProperty(t, n, { enumerable: !0, get: e[n] });
        }),
        (r.g = (function () {
            if ("object" == typeof globalThis) return globalThis;
            try {
                return this || new Function("return this")();
            } catch (t) {
                if ("object" == typeof window) return window;
            }
        })()),
        (r.o = function (t, e) {
            return Object.prototype.hasOwnProperty.call(t, e);
        }),
        (function () {
            var t;
            r.g.importScripts && (t = r.g.location + "");
            var e = r.g.document;
            if (!t && e && (e.currentScript && (t = e.currentScript.src), !t)) {
                var n = e.getElementsByTagName("script");
                n.length && (t = n[n.length - 1].src);
            }
            if (!t) throw new Error("Automatic publicPath is not supported in this browser");
            (t = t
                .replace(/#.*$/, "")
                .replace(/\?.*$/, "")
                .replace(/\/[^\/]+$/, "/")),
                (r.p = t);
        })(),
        (r.b = document.baseURI || self.location.href),
        (function () {
            "use strict";
            var t = r(91),
                e = r.n(t),
                n = new URL(r(339), r.b),
                o = new URL(r(694), r.b),
                i = new URL(r(786), r.b),
                a = new URL(r(354), r.b),
                c = new URL(r(862), r.b),
                s = new URL(r(243), r.b),
                u = new URL(r(587), r.b),
                l = new URL(r(409), r.b),
                f = new URL(r(314), r.b),
                d = new URL(r(718), r.b),
                p = new URL(r(867), r.b),
                h = new URL(r(301), r.b),
                v = new URL(r(193), r.b);
            e()(n), e()(o), e()(i), e()(a), e()(c), e()(s), e()(u), e()(l);
            function y(t, e) {
                e ? (t.classList.add("success"), t.classList.remove("error")) : (t.classList.add("error"), t.classList.remove("success"));
            }
            function m(t) {
                return /^[А-Яа-яЁё\s]+$/.test(String(t.value).toLowerCase()) ? (y(t, !0), !0) : (y(t, !1), !1);
            }
            e()(f), e()(d), e()(p), e()(h), e()(v), r(399), r(475), r(252);
            var g = function (t) {
                return 18 === t.value.length ? (y(t, !0), !0) : (y(t, !1), !1);
            };
            function b(t) {
                return (
                    (b =
                        "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
                            ? function (t) {
                                  return typeof t;
                              }
                            : function (t) {
                                  return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t;
                              }),
                    b(t)
                );
            }
            function w() {
                w = function () {
                    return t;
                };
                var t = {},
                    e = Object.prototype,
                    r = e.hasOwnProperty,
                    n =
                        Object.defineProperty ||
                        function (t, e, r) {
                            t[e] = r.value;
                        },
                    o = "function" == typeof Symbol ? Symbol : {},
                    i = o.iterator || "@@iterator",
                    a = o.asyncIterator || "@@asyncIterator",
                    c = o.toStringTag || "@@toStringTag";
                function s(t, e, r) {
                    return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e];
                }
                try {
                    s({}, "");
                } catch (t) {
                    s = function (t, e, r) {
                        return (t[e] = r);
                    };
                }
                function u(t, e, r, o) {
                    var i = e && e.prototype instanceof d ? e : d,
                        a = Object.create(i.prototype),
                        c = new O(o || []);
                    return n(a, "_invoke", { value: S(t, r, c) }), a;
                }
                function l(t, e, r) {
                    try {
                        return { type: "normal", arg: t.call(e, r) };
                    } catch (t) {
                        return { type: "throw", arg: t };
                    }
                }
                t.wrap = u;
                var f = {};
                function d() {}
                function p() {}
                function h() {}
                var v = {};
                s(v, i, function () {
                    return this;
                });
                var y = Object.getPrototypeOf,
                    m = y && y(y(A([])));
                m && m !== e && r.call(m, i) && (v = m);
                var g = (h.prototype = d.prototype = Object.create(v));
                function L(t) {
                    ["next", "throw", "return"].forEach(function (e) {
                        s(t, e, function (t) {
                            return this._invoke(e, t);
                        });
                    });
                }
                function x(t, e) {
                    function o(n, i, a, c) {
                        var s = l(t[n], t, i);
                        if ("throw" !== s.type) {
                            var u = s.arg,
                                f = u.value;
                            return f && "object" == b(f) && r.call(f, "__await")
                                ? e.resolve(f.__await).then(
                                      function (t) {
                                          o("next", t, a, c);
                                      },
                                      function (t) {
                                          o("throw", t, a, c);
                                      }
                                  )
                                : e.resolve(f).then(
                                      function (t) {
                                          (u.value = t), a(u);
                                      },
                                      function (t) {
                                          return o("throw", t, a, c);
                                      }
                                  );
                        }
                        c(s.arg);
                    }
                    var i;
                    n(this, "_invoke", {
                        value: function (t, r) {
                            function n() {
                                return new e(function (e, n) {
                                    o(t, r, e, n);
                                });
                            }
                            return (i = i ? i.then(n, n) : n());
                        },
                    });
                }
                function S(t, e, r) {
                    var n = "suspendedStart";
                    return function (o, i) {
                        if ("executing" === n) throw new Error("Generator is already running");
                        if ("completed" === n) {
                            if ("throw" === o) throw i;
                            return { value: void 0, done: !0 };
                        }
                        for (r.method = o, r.arg = i; ; ) {
                            var a = r.delegate;
                            if (a) {
                                var c = E(a, r);
                                if (c) {
                                    if (c === f) continue;
                                    return c;
                                }
                            }
                            if ("next" === r.method) r.sent = r._sent = r.arg;
                            else if ("throw" === r.method) {
                                if ("suspendedStart" === n) throw ((n = "completed"), r.arg);
                                r.dispatchException(r.arg);
                            } else "return" === r.method && r.abrupt("return", r.arg);
                            n = "executing";
                            var s = l(t, e, r);
                            if ("normal" === s.type) {
                                if (((n = r.done ? "completed" : "suspendedYield"), s.arg === f)) continue;
                                return { value: s.arg, done: r.done };
                            }
                            "throw" === s.type && ((n = "completed"), (r.method = "throw"), (r.arg = s.arg));
                        }
                    };
                }
                function E(t, e) {
                    var r = e.method,
                        n = t.iterator[r];
                    if (void 0 === n)
                        return (
                            (e.delegate = null),
                            ("throw" === r && t.iterator.return && ((e.method = "return"), (e.arg = void 0), E(t, e), "throw" === e.method)) ||
                                ("return" !== r && ((e.method = "throw"), (e.arg = new TypeError("The iterator does not provide a '" + r + "' method")))),
                            f
                        );
                    var o = l(n, t.iterator, e.arg);
                    if ("throw" === o.type) return (e.method = "throw"), (e.arg = o.arg), (e.delegate = null), f;
                    var i = o.arg;
                    return i
                        ? i.done
                            ? ((e[t.resultName] = i.value), (e.next = t.nextLoc), "return" !== e.method && ((e.method = "next"), (e.arg = void 0)), (e.delegate = null), f)
                            : i
                        : ((e.method = "throw"), (e.arg = new TypeError("iterator result is not an object")), (e.delegate = null), f);
                }
                function _(t) {
                    var e = { tryLoc: t[0] };
                    1 in t && (e.catchLoc = t[1]), 2 in t && ((e.finallyLoc = t[2]), (e.afterLoc = t[3])), this.tryEntries.push(e);
                }
                function j(t) {
                    var e = t.completion || {};
                    (e.type = "normal"), delete e.arg, (t.completion = e);
                }
                function O(t) {
                    (this.tryEntries = [{ tryLoc: "root" }]), t.forEach(_, this), this.reset(!0);
                }
                function A(t) {
                    if (t) {
                        var e = t[i];
                        if (e) return e.call(t);
                        if ("function" == typeof t.next) return t;
                        if (!isNaN(t.length)) {
                            var n = -1,
                                o = function e() {
                                    for (; ++n < t.length; ) if (r.call(t, n)) return (e.value = t[n]), (e.done = !1), e;
                                    return (e.value = void 0), (e.done = !0), e;
                                };
                            return (o.next = o);
                        }
                    }
                    return { next: k };
                }
                function k() {
                    return { value: void 0, done: !0 };
                }
                return (
                    (p.prototype = h),
                    n(g, "constructor", { value: h, configurable: !0 }),
                    n(h, "constructor", { value: p, configurable: !0 }),
                    (p.displayName = s(h, c, "GeneratorFunction")),
                    (t.isGeneratorFunction = function (t) {
                        var e = "function" == typeof t && t.constructor;
                        return !!e && (e === p || "GeneratorFunction" === (e.displayName || e.name));
                    }),
                    (t.mark = function (t) {
                        return Object.setPrototypeOf ? Object.setPrototypeOf(t, h) : ((t.__proto__ = h), s(t, c, "GeneratorFunction")), (t.prototype = Object.create(g)), t;
                    }),
                    (t.awrap = function (t) {
                        return { __await: t };
                    }),
                    L(x.prototype),
                    s(x.prototype, a, function () {
                        return this;
                    }),
                    (t.AsyncIterator = x),
                    (t.async = function (e, r, n, o, i) {
                        void 0 === i && (i = Promise);
                        var a = new x(u(e, r, n, o), i);
                        return t.isGeneratorFunction(r)
                            ? a
                            : a.next().then(function (t) {
                                  return t.done ? t.value : a.next();
                              });
                    }),
                    L(g),
                    s(g, c, "Generator"),
                    s(g, i, function () {
                        return this;
                    }),
                    s(g, "toString", function () {
                        return "[object Generator]";
                    }),
                    (t.keys = function (t) {
                        var e = Object(t),
                            r = [];
                        for (var n in e) r.push(n);
                        return (
                            r.reverse(),
                            function t() {
                                for (; r.length; ) {
                                    var n = r.pop();
                                    if (n in e) return (t.value = n), (t.done = !1), t;
                                }
                                return (t.done = !0), t;
                            }
                        );
                    }),
                    (t.values = A),
                    (O.prototype = {
                        constructor: O,
                        reset: function (t) {
                            if (((this.prev = 0), (this.next = 0), (this.sent = this._sent = void 0), (this.done = !1), (this.delegate = null), (this.method = "next"), (this.arg = void 0), this.tryEntries.forEach(j), !t))
                                for (var e in this) "t" === e.charAt(0) && r.call(this, e) && !isNaN(+e.slice(1)) && (this[e] = void 0);
                        },
                        stop: function () {
                            this.done = !0;
                            var t = this.tryEntries[0].completion;
                            if ("throw" === t.type) throw t.arg;
                            return this.rval;
                        },
                        dispatchException: function (t) {
                            if (this.done) throw t;
                            var e = this;
                            function n(r, n) {
                                return (a.type = "throw"), (a.arg = t), (e.next = r), n && ((e.method = "next"), (e.arg = void 0)), !!n;
                            }
                            for (var o = this.tryEntries.length - 1; o >= 0; --o) {
                                var i = this.tryEntries[o],
                                    a = i.completion;
                                if ("root" === i.tryLoc) return n("end");
                                if (i.tryLoc <= this.prev) {
                                    var c = r.call(i, "catchLoc"),
                                        s = r.call(i, "finallyLoc");
                                    if (c && s) {
                                        if (this.prev < i.catchLoc) return n(i.catchLoc, !0);
                                        if (this.prev < i.finallyLoc) return n(i.finallyLoc);
                                    } else if (c) {
                                        if (this.prev < i.catchLoc) return n(i.catchLoc, !0);
                                    } else {
                                        if (!s) throw new Error("try statement without catch or finally");
                                        if (this.prev < i.finallyLoc) return n(i.finallyLoc);
                                    }
                                }
                            }
                        },
                        abrupt: function (t, e) {
                            for (var n = this.tryEntries.length - 1; n >= 0; --n) {
                                var o = this.tryEntries[n];
                                if (o.tryLoc <= this.prev && r.call(o, "finallyLoc") && this.prev < o.finallyLoc) {
                                    var i = o;
                                    break;
                                }
                            }
                            i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null);
                            var a = i ? i.completion : {};
                            return (a.type = t), (a.arg = e), i ? ((this.method = "next"), (this.next = i.finallyLoc), f) : this.complete(a);
                        },
                        complete: function (t, e) {
                            if ("throw" === t.type) throw t.arg;
                            return (
                                "break" === t.type || "continue" === t.type
                                    ? (this.next = t.arg)
                                    : "return" === t.type
                                    ? ((this.rval = this.arg = t.arg), (this.method = "return"), (this.next = "end"))
                                    : "normal" === t.type && e && (this.next = e),
                                f
                            );
                        },
                        finish: function (t) {
                            for (var e = this.tryEntries.length - 1; e >= 0; --e) {
                                var r = this.tryEntries[e];
                                if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), j(r), f;
                            }
                        },
                        catch: function (t) {
                            for (var e = this.tryEntries.length - 1; e >= 0; --e) {
                                var r = this.tryEntries[e];
                                if (r.tryLoc === t) {
                                    var n = r.completion;
                                    if ("throw" === n.type) {
                                        var o = n.arg;
                                        j(r);
                                    }
                                    return o;
                                }
                            }
                            throw new Error("illegal catch attempt");
                        },
                        delegateYield: function (t, e, r) {
                            return (this.delegate = { iterator: A(t), resultName: e, nextLoc: r }), "next" === this.method && (this.arg = void 0), f;
                        },
                    }),
                    t
                );
            }
            function L(t, e) {
                (null == e || e > t.length) && (e = t.length);
                for (var r = 0, n = new Array(e); r < e; r++) n[r] = t[r];
                return n;
            }
            function x(t, e, r, n, o, i, a) {
                try {
                    var c = t[i](a),
                        s = c.value;
                } catch (t) {
                    return void r(t);
                }
                c.done ? e(s) : Promise.resolve(s).then(n, o);
            }
            var S = (function () {
                    var t,
                        e =
                            ((t = w().mark(function t(e, r, n) {
                                var o, i, a, c, s, u;
                                return w().wrap(function (t) {
                                    for (;;)
                                        switch ((t.prev = t.next)) {
                                            case 0:
                                                (f = 4),
                                                    (o =
                                                        (function (t) {
                                                            if (Array.isArray(t)) return t;
                                                        })((l = r)) ||
                                                        (function (t, e) {
                                                            var r = null == t ? null : ("undefined" != typeof Symbol && t[Symbol.iterator]) || t["@@iterator"];
                                                            if (null != r) {
                                                                var n,
                                                                    o,
                                                                    i,
                                                                    a,
                                                                    c = [],
                                                                    s = !0,
                                                                    u = !1;
                                                                try {
                                                                    if (((i = (r = r.call(t)).next), 0 === e)) {
                                                                        if (Object(r) !== r) return;
                                                                        s = !1;
                                                                    } else for (; !(s = (n = i.call(r)).done) && (c.push(n.value), c.length !== e); s = !0);
                                                                } catch (t) {
                                                                    (u = !0), (o = t);
                                                                } finally {
                                                                    try {
                                                                        if (!s && null != r.return && ((a = r.return()), Object(a) !== a)) return;
                                                                    } finally {
                                                                        if (u) throw o;
                                                                    }
                                                                }
                                                                return c;
                                                            }
                                                        })(l, f) ||
                                                        (function (t, e) {
                                                            if (t) {
                                                                if ("string" == typeof t) return L(t, e);
                                                                var r = Object.prototype.toString.call(t).slice(8, -1);
                                                                return (
                                                                    "Object" === r && t.constructor && (r = t.constructor.name),
                                                                    "Map" === r || "Set" === r ? Array.from(t) : "Arguments" === r || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r) ? L(t, e) : void 0
                                                                );
                                                            }
                                                        })(l, f) ||
                                                        (function () {
                                                            throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
                                                        })()),
                                                    (i = o[0]),
                                                    (a = o[1]),
                                                    (c = o[2]),
                                                    (s = o[3]),
                                                    (u = document.querySelector(".preloader")),
                                                    (i = i
                                                        .split(" ")
                                                        .map(function (t) {
                                                            return t[0].toUpperCase() + t.slice(1).toLowerCase();
                                                        })
                                                        .join(" ")),
                                                    $.ajax({
                                                        url: "/ajax/default_mf.php",
                                                        type: "POST",
                                                        cache: !1,
                                                        data: { fio: i, phone: a, region: c, query_string: s },
                                                        dataType: "html",
                                                        beforeSend: function () {
                                                            n.close(),
                                                            document.body.classList.add("no-scroll"),
                                                                u.classList.add("active"),
                                                                e.forEach(function (t) {
                                                                    t.disabled = !0;
                                                                });
                                                        },
                                                        success: function () {
                                                            setTimeout(function () {
                                                                document.body.classList.remove("no-scroll"),
                                                                    u.classList.remove("active"),
                                                                    swal("Отлично", "Данные успешно отправлены", "success"),
                                                                    e.forEach(function (t) {
                                                                        (t.disabled = !1);
                                                                    });}, 3e3);
                                                        },
                                                        error: function () {
                                                            swal("Ошибка", "Данные не отправлены", "error"),
                                                                e.forEach(function (t) {
                                                                    (t.disabled = !1);
                                                                });
                                                        },
                                                    });
                                            case 4:
                                            case "end":
                                                return t.stop();
                                        }
                                    var l, f;
                                }, t);
                            })),
                            function () {
                                var e = this,
                                    r = arguments;
                                return new Promise(function (n, o) {
                                    var i = t.apply(e, r);
                                    function a(t) {
                                        x(i, n, o, a, c, "next", t);
                                    }
                                    function c(t) {
                                        x(i, n, o, a, c, "throw", t);
                                    }
                                    a(void 0);
                                });
                            });
                    return function (t, r, n) {
                        return e.apply(this, arguments);
                    };
                })(),
                E = S;
            function _(t, e) {
                (null == e || e > t.length) && (e = t.length);
                for (var r = 0, n = new Array(e); r < e; r++) n[r] = t[r];
                return n;
            }
            document.addEventListener("DOMContentLoaded", function () {
                $(".tel-mask").mask("+7 (999) 999-99-99"),
                    ($.fn.setCursorPosition = function (t) {
                        if ($(this).get(0).setSelectionRange) $(this).get(0).setSelectionRange(t, t);
                        else if ($(this).get(0).createTextRange) {
                            var e = $(this).get(0).createTextRange();
                            e.collapse(!0), e.moveEnd("character", t), e.moveStart("character", t), e.select();
                        }
                    }),
                    $('input[type="tel"]').click(function () {
                        $(this).setCursorPosition(4);
                    });
                var t = document.querySelectorAll(".form"),
                    e = document.querySelector("#main-modal");
                t.forEach(function (t) {
                    var r,
                        n,
                        o = t.querySelectorAll("input"),
                        i =
                            ((n = 2),
                            (function (t) {
                                if (Array.isArray(t)) return t;
                            })((r = o)) ||
                                (function (t, e) {
                                    var r = null == t ? null : ("undefined" != typeof Symbol && t[Symbol.iterator]) || t["@@iterator"];
                                    if (null != r) {
                                        var n,
                                            o,
                                            i,
                                            a,
                                            c = [],
                                            s = !0,
                                            u = !1;
                                        try {
                                            if (((i = (r = r.call(t)).next), 0 === e)) {
                                                if (Object(r) !== r) return;
                                                s = !1;
                                            } else for (; !(s = (n = i.call(r)).done) && (c.push(n.value), c.length !== e); s = !0);
                                        } catch (t) {
                                            (u = !0), (o = t);
                                        } finally {
                                            try {
                                                if (!s && null != r.return && ((a = r.return()), Object(a) !== a)) return;
                                            } finally {
                                                if (u) throw o;
                                            }
                                        }
                                        return c;
                                    }
                                })(r, n) ||
                                (function (t, e) {
                                    if (t) {
                                        if ("string" == typeof t) return _(t, e);
                                        var r = Object.prototype.toString.call(t).slice(8, -1);
                                        return (
                                            "Object" === r && t.constructor && (r = t.constructor.name), "Map" === r || "Set" === r ? Array.from(t) : "Arguments" === r || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r) ? _(t, e) : void 0
                                        );
                                    }
                                })(r, n) ||
                                (function () {
                                    throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
                                })()),
                        a = i[0],
                        c = i[1],
                        s = t.querySelector(".region"),
                        u = t.querySelector(".query-string");
                    t.addEventListener("submit", function (t) {
                        t.preventDefault(), m(a), g(c), m(a) && g(c) && E(o, [a.value.trim(), c.value.trim(), s.value, u.value], e);
                    }),
                        ymaps.ready(function () {
                            ymaps.geolocation
                                .get({ provider: "yandex" })
                                .then(function (t) {
                                    var e = t.geoObjects.get(0);
                                    s.value = e.getAdministrativeAreas()[0];
                                })
                                .catch(function (t) {
                                    console.log("Не удалось установить местоположение", t);
                                });
                        });
                });
            });
        })();
})();

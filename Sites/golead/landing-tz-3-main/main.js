/*! For license information please see main.js.LICENSE.txt */
!(function () {
  var e = {
    5949: function () {
      var e = document.querySelector(".burger"),
        t = document.querySelector(".nav__mobile"),
        s = document.querySelector(".body");
      e.addEventListener("click", function () {
        e.classList.contains("burger__active")
          ? (e.classList.remove("burger__active"),
            t.classList.remove("nav__mobile__active"),
            s.classList.remove("hidden"))
          : (e.classList.add("burger__active"),
            t.classList.add("nav__mobile__active"),
            s.classList.add("hidden"));
      });
    },
    9796: function () {
      document.querySelectorAll("nav a").forEach(function (e) {
        e.addEventListener("click", function (t) {
          t.preventDefault();
          var s = e.getAttribute("href");
          document.querySelector(s).scrollIntoView({
            behavior: "smooth",
            block: "start",
          });
        });
      });
    },
    7091: function (e) {
      "use strict";
      e.exports = function (e, t) {
        return (
          t || (t = {}),
          e
            ? ((e = String(e.__esModule ? e.default : e)),
              t.hash && (e += t.hash),
              t.maybeNeedQuotes && /[\t\n\f\r "'=<>`]/.test(e)
                ? '"'.concat(e, '"')
                : e)
            : e
        );
      };
    },
    1183: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/courses-1.png";
    },
    8205: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/courses-2.png";
    },
    4144: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/courses-3.png";
    },
    4271: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/courses-4.png";
    },
    3619: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/img-1.svg";
    },
    9027: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/img-2.svg";
    },
    5578: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/img-3.svg";
    },
    2156: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/img-4.svg";
    },
    4126: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/doubt.svg";
    },
    4748: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/examples.svg";
    },
    8973: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/apple-touch-icon.png";
    },
    24: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/favicon-16x16.png";
    },
    7351: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/favicon-32x32.png";
    },
    6143: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/loading.gif";
    },
    4888: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/partnerrs-7.png";
    },
    3122: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/partners-1.svg";
    },
    7289: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/partners-2.svg";
    },
    7819: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/partners-3.svg";
    },
    8021: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/partners-4.png";
    },
    7249: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/partners-5.png";
    },
    7514: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/partners-6.png";
    },
    8461: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/partners-8.svg";
    },
    4225: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/promo-mobile.svg";
    },
    1076: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/promo.svg";
    },
    9523: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/qr.svg";
    },
    7192: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-1.jpg";
    },
    7700: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-10.jpg";
    },
    826: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-11.jpg";
    },
    4674: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-12.jpg";
    },
    2775: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-13.jpg";
    },
    5060: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-14.jpg";
    },
    1605: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-15.jpg";
    },
    2316: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-16.jpg";
    },
    9371: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-17.jpg";
    },
    4482: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-18.jpg";
    },
    9853: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-2.jpg";
    },
    299: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-3.jpg";
    },
    9653: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-4.jpg";
    },
    9608: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-5.jpg";
    },
    1438: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-6.jpg";
    },
    397: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-7.jpg";
    },
    466: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-8.jpg";
    },
    6575: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/slide-9.jpg";
    },
    2772: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/test.svg";
    },
    6836: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/why-we.svg";
    },
    9876: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/examples01.mp3";
    },
    4128: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/examples02.mp3";
    },
    2943: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/examples03.mp3";
    },
    7285: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/examples04.mp3";
    },
    4167: function (e, t, s) {
      "use strict";
      e.exports = s.p + "assets/site.webmanifest";
    },
  },
    t = {};
  function s(r) {
    var i = t[r];
    if (void 0 !== i) return i.exports;
    var n = (t[r] = {
      exports: {},
    });
    return e[r](n, n.exports, s), n.exports;
  }
  (s.m = e),
    (s.n = function (e) {
      var t =
        e && e.__esModule
          ? function () {
            return e.default;
          }
          : function () {
            return e;
          };
      return (
        s.d(t, {
          a: t,
        }),
        t
      );
    }),
    (s.d = function (e, t) {
      for (var r in t)
        s.o(t, r) &&
          !s.o(e, r) &&
          Object.defineProperty(e, r, {
            enumerable: !0,
            get: t[r],
          });
    }),
    (s.g = (function () {
      if ("object" == typeof globalThis) return globalThis;
      try {
        return this || new Function("return this")();
      } catch (e) {
        if ("object" == typeof window) return window;
      }
    })()),
    (s.o = function (e, t) {
      return Object.prototype.hasOwnProperty.call(e, t);
    }),
    (function () {
      var e;
      s.g.importScripts && (e = s.g.location + "");
      var t = s.g.document;
      if (!e && t && (t.currentScript && (e = t.currentScript.src), !e)) {
        var r = t.getElementsByTagName("script");
        r.length && (e = r[r.length - 1].src);
      }
      if (!e)
        throw new Error(
          "Automatic publicPath is not supported in this browser"
        );
      (e = e
        .replace(/#.*$/, "")
        .replace(/\?.*$/, "")
        .replace(/\/[^\/]+$/, "/")),
        (s.p = e);
    })(),
    (s.b = document.baseURI || self.location.href),
    (function () {
      "use strict";
      var e = s(7091),
        t = s.n(e),
        r = new URL(s(8973), s.b),
        i = new URL(s(7351), s.b),
        n = new URL(s(24), s.b),
        a = new URL(s(4167), s.b),
        o = new URL(s(1076), s.b),
        l = new URL(s(4225), s.b),
        c = new URL(s(9876), s.b),
        d = new URL(s(4128), s.b),
        p = new URL(s(2943), s.b),
        u = new URL(s(7285), s.b),
        f = new URL(s(4748), s.b),
        h = new URL(s(6836), s.b),
        m = new URL(s(7192), s.b),
        g = new URL(s(9853), s.b),
        v = new URL(s(299), s.b),
        w = new URL(s(9653), s.b),
        b = new URL(s(9608), s.b),
        y = new URL(s(1438), s.b),
        S = new URL(s(397), s.b),
        x = new URL(s(466), s.b),
        T = new URL(s(6575), s.b),
        E = new URL(s(7700), s.b),
        L = new URL(s(826), s.b),
        C = new URL(s(4674), s.b),
        M = new URL(s(2775), s.b),
        P = new URL(s(5060), s.b),
        k = new URL(s(1605), s.b),
        O = new URL(s(2316), s.b),
        A = new URL(s(9371), s.b),
        I = new URL(s(4482), s.b),
        z = new URL(s(3122), s.b),
        _ = new URL(s(7289), s.b),
        G = new URL(s(7819), s.b),
        R = new URL(s(8021), s.b),
        j = new URL(s(7249), s.b),
        B = new URL(s(7514), s.b),
        D = new URL(s(4888), s.b),
        N = new URL(s(8461), s.b),
        F = new URL(s(4126), s.b),
        q = new URL(s(1183), s.b),
        U = new URL(s(3619), s.b),
        V = new URL(s(8205), s.b),
        H = new URL(s(9027), s.b),
        W = new URL(s(4144), s.b),
        Y = new URL(s(5578), s.b),
        X = new URL(s(4271), s.b),
        K = new URL(s(2156), s.b),
        Z = new URL(s(9523), s.b),
        Q = new URL(s(2772), s.b),
        J = new URL(s(6143), s.b);
      t()(r),
        t()(i),
        t()(n),
        t()(a),
        t()(o),
        t()(l),
        t()(c),
        t()(d),
        t()(p),
        t()(u),
        t()(f),
        t()(h),
        t()(m),
        t()(g),
        t()(v),
        t()(w),
        t()(b),
        t()(y);
      function ee(e) {
        return (
          (ee =
            "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
              ? function (e) {
                return typeof e;
              }
              : function (e) {
                return e &&
                  "function" == typeof Symbol &&
                  e.constructor === Symbol &&
                  e !== Symbol.prototype
                  ? "symbol"
                  : typeof e;
              }),
          ee(e)
        );
      }
      function te() {
        te = function () {
          return e;
        };
        var e = {},
          t = Object.prototype,
          s = t.hasOwnProperty,
          r =
            Object.defineProperty ||
            function (e, t, s) {
              e[t] = s.value;
            },
          i = "function" == typeof Symbol ? Symbol : {},
          n = i.iterator || "@@iterator",
          a = i.asyncIterator || "@@asyncIterator",
          o = i.toStringTag || "@@toStringTag";
        function l(e, t, s) {
          return (
            Object.defineProperty(e, t, {
              value: s,
              enumerable: !0,
              configurable: !0,
              writable: !0,
            }),
            e[t]
          );
        }
        try {
          l({}, "");
        } catch (e) {
          l = function (e, t, s) {
            return (e[t] = s);
          };
        }
        function c(e, t, s, i) {
          var n = t && t.prototype instanceof u ? t : u,
            a = Object.create(n.prototype),
            o = new L(i || []);
          return (
            r(a, "_invoke", {
              value: S(e, s, o),
            }),
            a
          );
        }
        function d(e, t, s) {
          try {
            return {
              type: "normal",
              arg: e.call(t, s),
            };
          } catch (e) {
            return {
              type: "throw",
              arg: e,
            };
          }
        }
        e.wrap = c;
        var p = {};
        function u() { }
        function f() { }
        function h() { }
        var m = {};
        l(m, n, function () {
          return this;
        });
        var g = Object.getPrototypeOf,
          v = g && g(g(C([])));
        v && v !== t && s.call(v, n) && (m = v);
        var w = (h.prototype = u.prototype = Object.create(m));
        function b(e) {
          ["next", "throw", "return"].forEach(function (t) {
            l(e, t, function (e) {
              return this._invoke(t, e);
            });
          });
        }
        function y(e, t) {
          function i(r, n, a, o) {
            var l = d(e[r], e, n);
            if ("throw" !== l.type) {
              var c = l.arg,
                p = c.value;
              return p && "object" == ee(p) && s.call(p, "__await")
                ? t.resolve(p.__await).then(
                  function (e) {
                    i("next", e, a, o);
                  },
                  function (e) {
                    i("throw", e, a, o);
                  }
                )
                : t.resolve(p).then(
                  function (e) {
                    (c.value = e), a(c);
                  },
                  function (e) {
                    return i("throw", e, a, o);
                  }
                );
            }
            o(l.arg);
          }
          var n;
          r(this, "_invoke", {
            value: function (e, s) {
              function r() {
                return new t(function (t, r) {
                  i(e, s, t, r);
                });
              }
              return (n = n ? n.then(r, r) : r());
            },
          });
        }
        function S(e, t, s) {
          var r = "suspendedStart";
          return function (i, n) {
            if ("executing" === r)
              throw new Error("Generator is already running");
            if ("completed" === r) {
              if ("throw" === i) throw n;
              return {
                value: void 0,
                done: !0,
              };
            }
            for (s.method = i, s.arg = n; ;) {
              var a = s.delegate;
              if (a) {
                var o = x(a, s);
                if (o) {
                  if (o === p) continue;
                  return o;
                }
              }
              if ("next" === s.method) s.sent = s._sent = s.arg;
              else if ("throw" === s.method) {
                if ("suspendedStart" === r) throw ((r = "completed"), s.arg);
                s.dispatchException(s.arg);
              } else "return" === s.method && s.abrupt("return", s.arg);
              r = "executing";
              var l = d(e, t, s);
              if ("normal" === l.type) {
                if (
                  ((r = s.done ? "completed" : "suspendedYield"), l.arg === p)
                )
                  continue;
                return {
                  value: l.arg,
                  done: s.done,
                };
              }
              "throw" === l.type &&
                ((r = "completed"), (s.method = "throw"), (s.arg = l.arg));
            }
          };
        }
        function x(e, t) {
          var s = t.method,
            r = e.iterator[s];
          if (void 0 === r)
            return (
              (t.delegate = null),
              ("throw" === s &&
                e.iterator.return &&
                ((t.method = "return"),
                  (t.arg = void 0),
                  x(e, t),
                  "throw" === t.method)) ||
              ("return" !== s &&
                ((t.method = "throw"),
                  (t.arg = new TypeError(
                    "The iterator does not provide a '" + s + "' method"
                  )))),
              p
            );
          var i = d(r, e.iterator, t.arg);
          if ("throw" === i.type)
            return (
              (t.method = "throw"), (t.arg = i.arg), (t.delegate = null), p
            );
          var n = i.arg;
          return n
            ? n.done
              ? ((t[e.resultName] = n.value),
                (t.next = e.nextLoc),
                "return" !== t.method &&
                ((t.method = "next"), (t.arg = void 0)),
                (t.delegate = null),
                p)
              : n
            : ((t.method = "throw"),
              (t.arg = new TypeError("iterator result is not an object")),
              (t.delegate = null),
              p);
        }
        function T(e) {
          var t = {
            tryLoc: e[0],
          };
          1 in e && (t.catchLoc = e[1]),
            2 in e && ((t.finallyLoc = e[2]), (t.afterLoc = e[3])),
            this.tryEntries.push(t);
        }
        function E(e) {
          var t = e.completion || {};
          (t.type = "normal"), delete t.arg, (e.completion = t);
        }
        function L(e) {
          (this.tryEntries = [
            {
              tryLoc: "root",
            },
          ]),
            e.forEach(T, this),
            this.reset(!0);
        }
        function C(e) {
          if (e) {
            var t = e[n];
            if (t) return t.call(e);
            if ("function" == typeof e.next) return e;
            if (!isNaN(e.length)) {
              var r = -1,
                i = function t() {
                  for (; ++r < e.length;)
                    if (s.call(e, r)) return (t.value = e[r]), (t.done = !1), t;
                  return (t.value = void 0), (t.done = !0), t;
                };
              return (i.next = i);
            }
          }
          return {
            next: M,
          };
        }
        function M() {
          return {
            value: void 0,
            done: !0,
          };
        }
        return (
          (f.prototype = h),
          r(w, "constructor", {
            value: h,
            configurable: !0,
          }),
          r(h, "constructor", {
            value: f,
            configurable: !0,
          }),
          (f.displayName = l(h, o, "GeneratorFunction")),
          (e.isGeneratorFunction = function (e) {
            var t = "function" == typeof e && e.constructor;
            return (
              !!t &&
              (t === f || "GeneratorFunction" === (t.displayName || t.name))
            );
          }),
          (e.mark = function (e) {
            return (
              Object.setPrototypeOf
                ? Object.setPrototypeOf(e, h)
                : ((e.__proto__ = h), l(e, o, "GeneratorFunction")),
              (e.prototype = Object.create(w)),
              e
            );
          }),
          (e.awrap = function (e) {
            return {
              __await: e,
            };
          }),
          b(y.prototype),
          l(y.prototype, a, function () {
            return this;
          }),
          (e.AsyncIterator = y),
          (e.async = function (t, s, r, i, n) {
            void 0 === n && (n = Promise);
            var a = new y(c(t, s, r, i), n);
            return e.isGeneratorFunction(s)
              ? a
              : a.next().then(function (e) {
                return e.done ? e.value : a.next();
              });
          }),
          b(w),
          l(w, o, "Generator"),
          l(w, n, function () {
            return this;
          }),
          l(w, "toString", function () {
            return "[object Generator]";
          }),
          (e.keys = function (e) {
            var t = Object(e),
              s = [];
            for (var r in t) s.push(r);
            return (
              s.reverse(),
              function e() {
                for (; s.length;) {
                  var r = s.pop();
                  if (r in t) return (e.value = r), (e.done = !1), e;
                }
                return (e.done = !0), e;
              }
            );
          }),
          (e.values = C),
          (L.prototype = {
            constructor: L,
            reset: function (e) {
              if (
                ((this.prev = 0),
                  (this.next = 0),
                  (this.sent = this._sent = void 0),
                  (this.done = !1),
                  (this.delegate = null),
                  (this.method = "next"),
                  (this.arg = void 0),
                  this.tryEntries.forEach(E),
                  !e)
              )
                for (var t in this)
                  "t" === t.charAt(0) &&
                    s.call(this, t) &&
                    !isNaN(+t.slice(1)) &&
                    (this[t] = void 0);
            },
            stop: function () {
              this.done = !0;
              var e = this.tryEntries[0].completion;
              if ("throw" === e.type) throw e.arg;
              return this.rval;
            },
            dispatchException: function (e) {
              if (this.done) throw e;
              var t = this;
              function r(s, r) {
                return (
                  (a.type = "throw"),
                  (a.arg = e),
                  (t.next = s),
                  r && ((t.method = "next"), (t.arg = void 0)),
                  !!r
                );
              }
              for (var i = this.tryEntries.length - 1; i >= 0; --i) {
                var n = this.tryEntries[i],
                  a = n.completion;
                if ("root" === n.tryLoc) return r("end");
                if (n.tryLoc <= this.prev) {
                  var o = s.call(n, "catchLoc"),
                    l = s.call(n, "finallyLoc");
                  if (o && l) {
                    if (this.prev < n.catchLoc) return r(n.catchLoc, !0);
                    if (this.prev < n.finallyLoc) return r(n.finallyLoc);
                  } else if (o) {
                    if (this.prev < n.catchLoc) return r(n.catchLoc, !0);
                  } else {
                    if (!l)
                      throw new Error("try statement without catch or finally");
                    if (this.prev < n.finallyLoc) return r(n.finallyLoc);
                  }
                }
              }
            },
            abrupt: function (e, t) {
              for (var r = this.tryEntries.length - 1; r >= 0; --r) {
                var i = this.tryEntries[r];
                if (
                  i.tryLoc <= this.prev &&
                  s.call(i, "finallyLoc") &&
                  this.prev < i.finallyLoc
                ) {
                  var n = i;
                  break;
                }
              }
              n &&
                ("break" === e || "continue" === e) &&
                n.tryLoc <= t &&
                t <= n.finallyLoc &&
                (n = null);
              var a = n ? n.completion : {};
              return (
                (a.type = e),
                (a.arg = t),
                n
                  ? ((this.method = "next"), (this.next = n.finallyLoc), p)
                  : this.complete(a)
              );
            },
            complete: function (e, t) {
              if ("throw" === e.type) throw e.arg;
              return (
                "break" === e.type || "continue" === e.type
                  ? (this.next = e.arg)
                  : "return" === e.type
                    ? ((this.rval = this.arg = e.arg),
                      (this.method = "return"),
                      (this.next = "end"))
                    : "normal" === e.type && t && (this.next = t),
                p
              );
            },
            finish: function (e) {
              for (var t = this.tryEntries.length - 1; t >= 0; --t) {
                var s = this.tryEntries[t];
                if (s.finallyLoc === e)
                  return this.complete(s.completion, s.afterLoc), E(s), p;
              }
            },
            catch: function (e) {
              for (var t = this.tryEntries.length - 1; t >= 0; --t) {
                var s = this.tryEntries[t];
                if (s.tryLoc === e) {
                  var r = s.completion;
                  if ("throw" === r.type) {
                    var i = r.arg;
                    E(s);
                  }
                  return i;
                }
              }
              throw new Error("illegal catch attempt");
            },
            delegateYield: function (e, t, s) {
              return (
                (this.delegate = {
                  iterator: C(e),
                  resultName: t,
                  nextLoc: s,
                }),
                "next" === this.method && (this.arg = void 0),
                p
              );
            },
          }),
          e
        );
      }
      function se(e, t, s, r, i, n, a) {
        try {
          var o = e[n](a),
            l = o.value;
        } catch (e) {
          return void s(e);
        }
        o.done ? t(l) : Promise.resolve(l).then(r, i);
      }
      t()(S),
        t()(x),
        t()(T),
        t()(E),
        t()(L),
        t()(C),
        t()(M),
        t()(P),
        t()(k),
        t()(O),
        t()(A),
        t()(I),
        t()(z),
        t()(_),
        t()(G),
        t()(R),
        t()(j),
        t()(B),
        t()(D),
        t()(N),
        t()(F),
        t()(q),
        t()(U),
        t()(V),
        t()(H),
        t()(W),
        t()(Y),
        t()(X),
        t()(K),
        t()(Z),
        t()(Q),
        t()(J);
      var re = document.querySelector(".preloader"),
        ie = (function () {
          var e,
            t =
              ((e = te().mark(function e(t) {
                var s;
                return te().wrap(function (e) {
                  for (; ;)
                    switch ((e.prev = e.next)) {
                      case 0:
                        (s = {}),
                          t.forEach(function (e) {
                            "fio" === e.name &&
                              (e.value = e.value
                                .split(" ")
                                .map(function (e) {
                                  return (
                                    e[0].toUpperCase() +
                                    e.slice(1).toLowerCase()
                                  );
                                })
                                .join(" ")),
                              (s[e.name] = e.value.trim());
                          }),
                          $.ajax({
                            url: "/ajax/default_mf.php",
                            type: "POST",
                            cache: !1,
                            data: s,
                            dataType: "html",
                            beforeSend: function () {
                              re.classList.add("shown"),
                                t.forEach(function (e) {
                                  e.disabled = !0;
                                });
                            },
                            success: function () {
                              setTimeout(function () {
                                ym(92547615, 'reachGoal', 'https://golead.myforce.ru/thanks.php '),
                                  re.classList.remove("shown"),
                                  (window.location.href = "thx.php"),
                                  t.forEach(function (e) {
                                    e.disabled = !1;
                                  });
                              }, 3e3);
                            },
                            error: function () {
                              re.classList.remove("shown"),
                                swal("Ошибка", "Данные не отправлены", "error"),
                                t.forEach(function (e) {
                                  e.disabled = !1;
                                });
                            },
                          });
                      case 3:
                      case "end":
                        return e.stop();
                    }
                }, e);
              })),
                function () {
                  var t = this,
                    s = arguments;
                  return new Promise(function (r, i) {
                    var n = e.apply(t, s);
                    function a(e) {
                      se(n, r, i, a, o, "next", e);
                    }
                    function o(e) {
                      se(n, r, i, a, o, "throw", e);
                    }
                    a(void 0);
                  });
                });
          return function (e) {
            return t.apply(this, arguments);
          };
        })(),
        ne = ie;
      function ae(e, t) {
        t
          ? (e.classList.add("success"), e.classList.remove("error"))
          : (e.classList.add("error"), e.classList.remove("success"));
      }
      function oe(e) {
        return /^[А-Яа-яЁё\s]+$/.test(String(e.value).toLowerCase())
          ? (ae(e, !0), !0)
          : (ae(e, !1), !1);
      }
      function le(e) {
        return /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
          String(e.value).toLowerCase()
        )
          ? (ae(e, !0), !0)
          : (ae(e, !1), !1);
      }
      function ce(e) {
        return 18 === e.value.length ? (ae(e, !0), !0) : (ae(e, !1), !1);
      }
      var de = function (e) {
        var t =
          !(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1],
          s = !0;
        return (
          e.forEach(function (e) {
            switch (e.type) {
              case "text":
                oe(e) || (s = !1);
                break;
              case "email":
                le(e) || (s = !1);
                break;
              case "tel":
                ce(e) || (s = !1);
            }
          }),
          !!s && (!t || ne(e), !0)
        );
      };
      function pe(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var s = 0, r = new Array(t); s < t; s++) r[s] = e[s];
        return r;
      }
      document.addEventListener("DOMContentLoaded", function () {
        var e,
          t,
          s = document.querySelectorAll(".open-modal"),
          r = document.querySelectorAll(".modal"),
          i = document.body,
          n =
            ((t = 3),
              (function (e) {
                if (Array.isArray(e)) return e;
              })((e = r)) ||
              (function (e, t) {
                var s =
                  null == e
                    ? null
                    : ("undefined" != typeof Symbol && e[Symbol.iterator]) ||
                    e["@@iterator"];
                if (null != s) {
                  var r,
                    i,
                    n,
                    a,
                    o = [],
                    l = !0,
                    c = !1;
                  try {
                    if (((n = (s = s.call(e)).next), 0 === t)) {
                      if (Object(s) !== s) return;
                      l = !1;
                    } else
                      for (
                        ;
                        !(l = (r = n.call(s)).done) &&
                        (o.push(r.value), o.length !== t);
                        l = !0
                      );
                  } catch (e) {
                    (c = !0), (i = e);
                  } finally {
                    try {
                      if (
                        !l &&
                        null != s.return &&
                        ((a = s.return()), Object(a) !== a)
                      )
                        return;
                    } finally {
                      if (c) throw i;
                    }
                  }
                  return o;
                }
              })(e, t) ||
              (function (e, t) {
                if (e) {
                  if ("string" == typeof e) return pe(e, t);
                  var s = Object.prototype.toString.call(e).slice(8, -1);
                  return (
                    "Object" === s && e.constructor && (s = e.constructor.name),
                    "Map" === s || "Set" === s
                      ? Array.from(e)
                      : "Arguments" === s ||
                        /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(s)
                        ? pe(e, t)
                        : void 0
                  );
                }
              })(e, t) ||
              (function () {
                throw new TypeError(
                  "Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
                );
              })()),
          a = n[0],
          o = n[1],
          l = n[2];
        null === localStorage.getItem("leaveModalClose") &&
          "false" !== localStorage.getItem("leaveModalClose") &&
          localStorage.setItem("leaveModalClose", "true"),
          null === localStorage.getItem("waitingModalClose") &&
          "false" !== localStorage.getItem("waitingModalClose") &&
          localStorage.setItem("waitingModalClose", "true"),
          s.forEach(function (e) {
            e.addEventListener("click", function () {
              a.classList.add("modal__active"), i.classList.add("hidden");
            });
          }),
          r.forEach(function (e) {
            e.addEventListener("click", function (t) {
              t.preventDefault(),
                (t.target === e || t.target.classList.contains("close")) &&
                (e.classList.remove("modal__active"),
                  i.classList.remove("hidden"));
            });
          }),
          document.addEventListener("mousemove", function (e) {
            "true" === localStorage.getItem("leaveModalClose") &&
              e.clientY <= 20 &&
              (localStorage.setItem("leaveModalClose", "false"),
                l.classList.add("modal__active"),
                i.classList.add("hidden"));
          }),
          setTimeout(function () {
            "true" === localStorage.getItem("waitingModalClose") &&
              (o.classList.add("modal__active"),
                i.classList.add("hidden"),
                localStorage.setItem("waitingModalClose", "false"));
          }, 3e5),
          document.querySelectorAll(".cta__modal").forEach(function (e) {
            e.addEventListener("click", function () {
              return de(e.parentNode.querySelectorAll(".input"));
            });
          });
      }),
        s(5949),
        s(9796);
      var ue = document.querySelectorAll(".quiz__question");
      function fe(e) {
        return (
          null !== e &&
          "object" == typeof e &&
          "constructor" in e &&
          e.constructor === Object
        );
      }
      function he(e = {}, t = {}) {
        Object.keys(t).forEach((s) => {
          void 0 === e[s]
            ? (e[s] = t[s])
            : fe(t[s]) &&
            fe(e[s]) &&
            Object.keys(t[s]).length > 0 &&
            he(e[s], t[s]);
        });
      }
      ue.forEach(function (e, t) {
        e
          .querySelector(".quiz__control")
          .addEventListener("click", function (s) {
            if (
              (s.preventDefault(),
                s.target.classList.contains("quiz__back") &&
                (e.classList.remove("active"),
                  ue[t - 1].classList.add("active")),
                s.target.classList.contains("quiz__forward") &&
                (e.classList.remove("active"),
                  ue[t + 1].classList.add("active")),
                s.target.classList.contains("quiz__send"))
            ) {
              var r = [];
              ue.forEach(function (e) {
                var t = e.querySelectorAll("input");
                de(t, !1) &&
                  t.forEach(function (e) {
                    "radio" === e.type ? e.checked && r.push(e) : r.push(e);
                  });
              }),
                6 === r.length
                  ? ((r[1].value += "\n        "
                    .concat(r[0].value, "\n        ")
                    .concat(r[2].value, "\n        ")),
                    (r[3].value += "\n        ".concat(r[4].value)),
                    r.splice(0, 1),
                    r.splice(1, 1),
                    r.splice(2, 1),
                    r.push(document.querySelector(".region")),
                    r.push(document.querySelector(".query_string")),
                    ne(r))
                  : swal("Ошибка", "Некорректные данные", "error");
            }
          }),
          e.querySelectorAll(".quiz__input").forEach(function (e) {
            e.addEventListener("click", function () {
              return (e.querySelector("input[type='radio']").checked = !0);
            });
          });
      });
      const me = {
        body: {},
        addEventListener() { },
        removeEventListener() { },
        activeElement: {
          blur() { },
          nodeName: "",
        },
        querySelector() {
          return null;
        },
        querySelectorAll() {
          return [];
        },
        getElementById() {
          return null;
        },
        createEvent() {
          return {
            initEvent() { },
          };
        },
        createElement() {
          return {
            children: [],
            childNodes: [],
            style: {},
            setAttribute() { },
            getElementsByTagName() {
              return [];
            },
          };
        },
        createElementNS() {
          return {};
        },
        importNode() {
          return null;
        },
        location: {
          hash: "",
          host: "",
          hostname: "",
          href: "",
          origin: "",
          pathname: "",
          protocol: "",
          search: "",
        },
      };
      function ge() {
        const e = "undefined" != typeof document ? document : {};
        return he(e, me), e;
      }
      const ve = {
        document: me,
        navigator: {
          userAgent: "",
        },
        location: {
          hash: "",
          host: "",
          hostname: "",
          href: "",
          origin: "",
          pathname: "",
          protocol: "",
          search: "",
        },
        history: {
          replaceState() { },
          pushState() { },
          go() { },
          back() { },
        },
        CustomEvent: function () {
          return this;
        },
        addEventListener() { },
        removeEventListener() { },
        getComputedStyle() {
          return {
            getPropertyValue() {
              return "";
            },
          };
        },
        Image() { },
        Date() { },
        screen: {},
        setTimeout() { },
        clearTimeout() { },
        matchMedia() {
          return {};
        },
        requestAnimationFrame(e) {
          return "undefined" == typeof setTimeout
            ? (e(), null)
            : setTimeout(e, 0);
        },
        cancelAnimationFrame(e) {
          "undefined" != typeof setTimeout && clearTimeout(e);
        },
      };
      function we() {
        const e = "undefined" != typeof window ? window : {};
        return he(e, ve), e;
      }
      function be(e, t = 0) {
        return setTimeout(e, t);
      }
      function ye() {
        return Date.now();
      }
      function Se(e) {
        return (
          "object" == typeof e &&
          null !== e &&
          e.constructor &&
          "Object" === Object.prototype.toString.call(e).slice(8, -1)
        );
      }
      function xe(...e) {
        const t = Object(e[0]),
          s = ["__proto__", "constructor", "prototype"];
        for (let i = 1; i < e.length; i += 1) {
          const n = e[i];
          if (
            null != n &&
            ((r = n),
              !("undefined" != typeof window && void 0 !== window.HTMLElement
                ? r instanceof HTMLElement
                : r && (1 === r.nodeType || 11 === r.nodeType)))
          ) {
            const e = Object.keys(Object(n)).filter((e) => s.indexOf(e) < 0);
            for (let s = 0, r = e.length; s < r; s += 1) {
              const r = e[s],
                i = Object.getOwnPropertyDescriptor(n, r);
              void 0 !== i &&
                i.enumerable &&
                (Se(t[r]) && Se(n[r])
                  ? n[r].__swiper__
                    ? (t[r] = n[r])
                    : xe(t[r], n[r])
                  : !Se(t[r]) && Se(n[r])
                    ? ((t[r] = {}),
                      n[r].__swiper__ ? (t[r] = n[r]) : xe(t[r], n[r]))
                    : (t[r] = n[r]));
            }
          }
        }
        var r;
        return t;
      }
      function Te(e, t, s) {
        e.style.setProperty(t, s);
      }
      function Ee({ swiper: e, targetPosition: t, side: s }) {
        const r = we(),
          i = -e.translate;
        let n,
          a = null;
        const o = e.params.speed;
        (e.wrapperEl.style.scrollSnapType = "none"),
          r.cancelAnimationFrame(e.cssModeFrameID);
        const l = t > i ? "next" : "prev",
          c = (e, t) => ("next" === l && e >= t) || ("prev" === l && e <= t),
          d = () => {
            (n = new Date().getTime()), null === a && (a = n);
            const l = Math.max(Math.min((n - a) / o, 1), 0),
              p = 0.5 - Math.cos(l * Math.PI) / 2;
            let u = i + p * (t - i);
            if (
              (c(u, t) && (u = t),
                e.wrapperEl.scrollTo({
                  [s]: u,
                }),
                c(u, t))
            )
              return (
                (e.wrapperEl.style.overflow = "hidden"),
                (e.wrapperEl.style.scrollSnapType = ""),
                setTimeout(() => {
                  (e.wrapperEl.style.overflow = ""),
                    e.wrapperEl.scrollTo({
                      [s]: u,
                    });
                }),
                void r.cancelAnimationFrame(e.cssModeFrameID)
              );
            e.cssModeFrameID = r.requestAnimationFrame(d);
          };
        d();
      }
      function Le(e, t = "") {
        return [...e.children].filter((e) => e.matches(t));
      }
      function Ce(e, t = []) {
        const s = document.createElement(e);
        return s.classList.add(...(Array.isArray(t) ? t : [t])), s;
      }
      function Me(e, t) {
        return we().getComputedStyle(e, null).getPropertyValue(t);
      }
      function Pe(e) {
        let t,
          s = e;
        if (s) {
          for (t = 0; null !== (s = s.previousSibling);)
            1 === s.nodeType && (t += 1);
          return t;
        }
      }
      function ke(e, t) {
        const s = [];
        let r = e.parentElement;
        for (; r;)
          t ? r.matches(t) && s.push(r) : s.push(r), (r = r.parentElement);
        return s;
      }
      function Oe(e, t, s) {
        const r = we();
        return s
          ? e["width" === t ? "offsetWidth" : "offsetHeight"] +
          parseFloat(
            r
              .getComputedStyle(e, null)
              .getPropertyValue(
                "width" === t ? "margin-right" : "margin-top"
              )
          ) +
          parseFloat(
            r
              .getComputedStyle(e, null)
              .getPropertyValue(
                "width" === t ? "margin-left" : "margin-bottom"
              )
          )
          : e.offsetWidth;
      }
      let Ae, Ie, ze;
      function _e() {
        return (
          Ae ||
          (Ae = (function () {
            const e = we(),
              t = ge();
            return {
              smoothScroll:
                t.documentElement &&
                "scrollBehavior" in t.documentElement.style,
              touch: !!(
                "ontouchstart" in e ||
                (e.DocumentTouch && t instanceof e.DocumentTouch)
              ),
            };
          })()),
          Ae
        );
      }
      var Ge = {
        on(e, t, s) {
          const r = this;
          if (!r.eventsListeners || r.destroyed) return r;
          if ("function" != typeof t) return r;
          const i = s ? "unshift" : "push";
          return (
            e.split(" ").forEach((e) => {
              r.eventsListeners[e] || (r.eventsListeners[e] = []),
                r.eventsListeners[e][i](t);
            }),
            r
          );
        },
        once(e, t, s) {
          const r = this;
          if (!r.eventsListeners || r.destroyed) return r;
          if ("function" != typeof t) return r;
          function i(...s) {
            r.off(e, i),
              i.__emitterProxy && delete i.__emitterProxy,
              t.apply(r, s);
          }
          return (i.__emitterProxy = t), r.on(e, i, s);
        },
        onAny(e, t) {
          const s = this;
          if (!s.eventsListeners || s.destroyed) return s;
          if ("function" != typeof e) return s;
          const r = t ? "unshift" : "push";
          return (
            s.eventsAnyListeners.indexOf(e) < 0 && s.eventsAnyListeners[r](e),
            s
          );
        },
        offAny(e) {
          const t = this;
          if (!t.eventsListeners || t.destroyed) return t;
          if (!t.eventsAnyListeners) return t;
          const s = t.eventsAnyListeners.indexOf(e);
          return s >= 0 && t.eventsAnyListeners.splice(s, 1), t;
        },
        off(e, t) {
          const s = this;
          return !s.eventsListeners || s.destroyed
            ? s
            : s.eventsListeners
              ? (e.split(" ").forEach((e) => {
                void 0 === t
                  ? (s.eventsListeners[e] = [])
                  : s.eventsListeners[e] &&
                  s.eventsListeners[e].forEach((r, i) => {
                    (r === t ||
                      (r.__emitterProxy && r.__emitterProxy === t)) &&
                      s.eventsListeners[e].splice(i, 1);
                  });
              }),
                s)
              : s;
        },
        emit(...e) {
          const t = this;
          if (!t.eventsListeners || t.destroyed) return t;
          if (!t.eventsListeners) return t;
          let s, r, i;
          return (
            "string" == typeof e[0] || Array.isArray(e[0])
              ? ((s = e[0]), (r = e.slice(1, e.length)), (i = t))
              : ((s = e[0].events), (r = e[0].data), (i = e[0].context || t)),
            r.unshift(i),
            (Array.isArray(s) ? s : s.split(" ")).forEach((e) => {
              t.eventsAnyListeners &&
                t.eventsAnyListeners.length &&
                t.eventsAnyListeners.forEach((t) => {
                  t.apply(i, [e, ...r]);
                }),
                t.eventsListeners &&
                t.eventsListeners[e] &&
                t.eventsListeners[e].forEach((e) => {
                  e.apply(i, r);
                });
            }),
            t
          );
        },
      },
        $e = {
          updateSize: function () {
            const e = this;
            let t, s;
            const r = e.el;
            (t =
              void 0 !== e.params.width && null !== e.params.width
                ? e.params.width
                : r.clientWidth),
              (s =
                void 0 !== e.params.height && null !== e.params.height
                  ? e.params.height
                  : r.clientHeight),
              (0 === t && e.isHorizontal()) ||
              (0 === s && e.isVertical()) ||
              ((t =
                t -
                parseInt(Me(r, "padding-left") || 0, 10) -
                parseInt(Me(r, "padding-right") || 0, 10)),
                (s =
                  s -
                  parseInt(Me(r, "padding-top") || 0, 10) -
                  parseInt(Me(r, "padding-bottom") || 0, 10)),
                Number.isNaN(t) && (t = 0),
                Number.isNaN(s) && (s = 0),
                Object.assign(e, {
                  width: t,
                  height: s,
                  size: e.isHorizontal() ? t : s,
                }));
          },
          updateSlides: function () {
            const e = this;
            function t(t) {
              return e.isHorizontal()
                ? t
                : {
                  width: "height",
                  "margin-top": "margin-left",
                  "margin-bottom ": "margin-right",
                  "margin-left": "margin-top",
                  "margin-right": "margin-bottom",
                  "padding-left": "padding-top",
                  "padding-right": "padding-bottom",
                  marginRight: "marginBottom",
                }[t];
            }
            function s(e, s) {
              return parseFloat(e.getPropertyValue(t(s)) || 0);
            }
            const r = e.params,
              {
                wrapperEl: i,
                slidesEl: n,
                size: a,
                rtlTranslate: o,
                wrongRTL: l,
              } = e,
              c = e.virtual && r.virtual.enabled,
              d = c ? e.virtual.slides.length : e.slides.length,
              p = Le(n, `.${e.params.slideClass}, swiper-slide`),
              u = c ? e.virtual.slides.length : p.length;
            let f = [];
            const h = [],
              m = [];
            let g = r.slidesOffsetBefore;
            "function" == typeof g && (g = r.slidesOffsetBefore.call(e));
            let v = r.slidesOffsetAfter;
            "function" == typeof v && (v = r.slidesOffsetAfter.call(e));
            const w = e.snapGrid.length,
              b = e.slidesGrid.length;
            let y = r.spaceBetween,
              S = -g,
              x = 0,
              T = 0;
            if (void 0 === a) return;
            "string" == typeof y &&
              y.indexOf("%") >= 0 &&
              (y = (parseFloat(y.replace("%", "")) / 100) * a),
              (e.virtualSize = -y),
              p.forEach((e) => {
                o ? (e.style.marginLeft = "") : (e.style.marginRight = ""),
                  (e.style.marginBottom = ""),
                  (e.style.marginTop = "");
              }),
              r.centeredSlides &&
              r.cssMode &&
              (Te(i, "--swiper-centered-offset-before", ""),
                Te(i, "--swiper-centered-offset-after", ""));
            const E = r.grid && r.grid.rows > 1 && e.grid;
            let L;
            E && e.grid.initSlides(u);
            const C =
              "auto" === r.slidesPerView &&
              r.breakpoints &&
              Object.keys(r.breakpoints).filter(
                (e) => void 0 !== r.breakpoints[e].slidesPerView
              ).length > 0;
            for (let i = 0; i < u; i += 1) {
              let n;
              if (
                ((L = 0),
                  p[i] && (n = p[i]),
                  E && e.grid.updateSlide(i, n, u, t),
                  !p[i] || "none" !== Me(n, "display"))
              ) {
                if ("auto" === r.slidesPerView) {
                  C && (p[i].style[t("width")] = "");
                  const a = getComputedStyle(n),
                    o = n.style.transform,
                    l = n.style.webkitTransform;
                  if (
                    (o && (n.style.transform = "none"),
                      l && (n.style.webkitTransform = "none"),
                      r.roundLengths)
                  )
                    L = e.isHorizontal()
                      ? Oe(n, "width", !0)
                      : Oe(n, "height", !0);
                  else {
                    const e = s(a, "width"),
                      t = s(a, "padding-left"),
                      r = s(a, "padding-right"),
                      i = s(a, "margin-left"),
                      o = s(a, "margin-right"),
                      l = a.getPropertyValue("box-sizing");
                    if (l && "border-box" === l) L = e + i + o;
                    else {
                      const { clientWidth: s, offsetWidth: a } = n;
                      L = e + t + r + i + o + (a - s);
                    }
                  }
                  o && (n.style.transform = o),
                    l && (n.style.webkitTransform = l),
                    r.roundLengths && (L = Math.floor(L));
                } else
                  (L = (a - (r.slidesPerView - 1) * y) / r.slidesPerView),
                    r.roundLengths && (L = Math.floor(L)),
                    p[i] && (p[i].style[t("width")] = `${L}px`);
                p[i] && (p[i].swiperSlideSize = L),
                  m.push(L),
                  r.centeredSlides
                    ? ((S = S + L / 2 + x / 2 + y),
                      0 === x && 0 !== i && (S = S - a / 2 - y),
                      0 === i && (S = S - a / 2 - y),
                      Math.abs(S) < 0.001 && (S = 0),
                      r.roundLengths && (S = Math.floor(S)),
                      T % r.slidesPerGroup == 0 && f.push(S),
                      h.push(S))
                    : (r.roundLengths && (S = Math.floor(S)),
                      (T - Math.min(e.params.slidesPerGroupSkip, T)) %
                      e.params.slidesPerGroup ==
                      0 && f.push(S),
                      h.push(S),
                      (S = S + L + y)),
                  (e.virtualSize += L + y),
                  (x = L),
                  (T += 1);
              }
            }
            if (
              ((e.virtualSize = Math.max(e.virtualSize, a) + v),
                o &&
                l &&
                ("slide" === r.effect || "coverflow" === r.effect) &&
                (i.style.width = `${e.virtualSize + r.spaceBetween}px`),
                r.setWrapperSize &&
                (i.style[t("width")] = `${e.virtualSize + r.spaceBetween}px`),
                E && e.grid.updateWrapperSize(L, f, t),
                !r.centeredSlides)
            ) {
              const t = [];
              for (let s = 0; s < f.length; s += 1) {
                let i = f[s];
                r.roundLengths && (i = Math.floor(i)),
                  f[s] <= e.virtualSize - a && t.push(i);
              }
              (f = t),
                Math.floor(e.virtualSize - a) - Math.floor(f[f.length - 1]) >
                1 && f.push(e.virtualSize - a);
            }
            if (c && r.loop) {
              const t = m[0] + y;
              if (r.slidesPerGroup > 1) {
                const s = Math.ceil(
                  (e.virtual.slidesBefore + e.virtual.slidesAfter) /
                  r.slidesPerGroup
                ),
                  i = t * r.slidesPerGroup;
                for (let e = 0; e < s; e += 1) f.push(f[f.length - 1] + i);
              }
              for (
                let s = 0;
                s < e.virtual.slidesBefore + e.virtual.slidesAfter;
                s += 1
              )
                1 === r.slidesPerGroup && f.push(f[f.length - 1] + t),
                  h.push(h[h.length - 1] + t),
                  (e.virtualSize += t);
            }
            if ((0 === f.length && (f = [0]), 0 !== r.spaceBetween)) {
              const s = e.isHorizontal() && o ? "marginLeft" : t("marginRight");
              p.filter(
                (e, t) => !(r.cssMode && !r.loop) || t !== p.length - 1
              ).forEach((e) => {
                e.style[s] = `${y}px`;
              });
            }
            if (r.centeredSlides && r.centeredSlidesBounds) {
              let e = 0;
              m.forEach((t) => {
                e += t + (r.spaceBetween ? r.spaceBetween : 0);
              }),
                (e -= r.spaceBetween);
              const t = e - a;
              f = f.map((e) => (e < 0 ? -g : e > t ? t + v : e));
            }
            if (r.centerInsufficientSlides) {
              let e = 0;
              if (
                (m.forEach((t) => {
                  e += t + (r.spaceBetween ? r.spaceBetween : 0);
                }),
                  (e -= r.spaceBetween),
                  e < a)
              ) {
                const t = (a - e) / 2;
                f.forEach((e, s) => {
                  f[s] = e - t;
                }),
                  h.forEach((e, s) => {
                    h[s] = e + t;
                  });
              }
            }
            if (
              (Object.assign(e, {
                slides: p,
                snapGrid: f,
                slidesGrid: h,
                slidesSizesGrid: m,
              }),
                r.centeredSlides && r.cssMode && !r.centeredSlidesBounds)
            ) {
              Te(i, "--swiper-centered-offset-before", -f[0] + "px"),
                Te(
                  i,
                  "--swiper-centered-offset-after",
                  e.size / 2 - m[m.length - 1] / 2 + "px"
                );
              const t = -e.snapGrid[0],
                s = -e.slidesGrid[0];
              (e.snapGrid = e.snapGrid.map((e) => e + t)),
                (e.slidesGrid = e.slidesGrid.map((e) => e + s));
            }
            if (
              (u !== d && e.emit("slidesLengthChange"),
                f.length !== w &&
                (e.params.watchOverflow && e.checkOverflow(),
                  e.emit("snapGridLengthChange")),
                h.length !== b && e.emit("slidesGridLengthChange"),
                r.watchSlidesProgress && e.updateSlidesOffset(),
                !(
                  c ||
                  r.cssMode ||
                  ("slide" !== r.effect && "fade" !== r.effect)
                ))
            ) {
              const t = `${r.containerModifierClass}backface-hidden`,
                s = e.el.classList.contains(t);
              u <= r.maxBackfaceHiddenSlides
                ? s || e.el.classList.add(t)
                : s && e.el.classList.remove(t);
            }
          },
          updateAutoHeight: function (e) {
            const t = this,
              s = [],
              r = t.virtual && t.params.virtual.enabled;
            let i,
              n = 0;
            "number" == typeof e
              ? t.setTransition(e)
              : !0 === e && t.setTransition(t.params.speed);
            const a = (e) =>
              r
                ? t.slides.filter(
                  (t) =>
                    parseInt(
                      t.getAttribute("data-swiper-slide-index"),
                      10
                    ) === e
                )[0]
                : t.slides[e];
            if ("auto" !== t.params.slidesPerView && t.params.slidesPerView > 1)
              if (t.params.centeredSlides)
                (t.visibleSlides || []).forEach((e) => {
                  s.push(e);
                });
              else
                for (i = 0; i < Math.ceil(t.params.slidesPerView); i += 1) {
                  const e = t.activeIndex + i;
                  if (e > t.slides.length && !r) break;
                  s.push(a(e));
                }
            else s.push(a(t.activeIndex));
            for (i = 0; i < s.length; i += 1)
              if (void 0 !== s[i]) {
                const e = s[i].offsetHeight;
                n = e > n ? e : n;
              }
            (n || 0 === n) && (t.wrapperEl.style.height = `${n}px`);
          },
          updateSlidesOffset: function () {
            const e = this,
              t = e.slides,
              s = e.isElement
                ? e.isHorizontal()
                  ? e.wrapperEl.offsetLeft
                  : e.wrapperEl.offsetTop
                : 0;
            for (let r = 0; r < t.length; r += 1)
              t[r].swiperSlideOffset =
                (e.isHorizontal() ? t[r].offsetLeft : t[r].offsetTop) - s;
          },
          updateSlidesProgress: function (e = (this && this.translate) || 0) {
            const t = this,
              s = t.params,
              { slides: r, rtlTranslate: i, snapGrid: n } = t;
            if (0 === r.length) return;
            void 0 === r[0].swiperSlideOffset && t.updateSlidesOffset();
            let a = -e;
            i && (a = e),
              r.forEach((e) => {
                e.classList.remove(s.slideVisibleClass);
              }),
              (t.visibleSlidesIndexes = []),
              (t.visibleSlides = []);
            for (let e = 0; e < r.length; e += 1) {
              const o = r[e];
              let l = o.swiperSlideOffset;
              s.cssMode && s.centeredSlides && (l -= r[0].swiperSlideOffset);
              const c =
                (a + (s.centeredSlides ? t.minTranslate() : 0) - l) /
                (o.swiperSlideSize + s.spaceBetween),
                d =
                  (a - n[0] + (s.centeredSlides ? t.minTranslate() : 0) - l) /
                  (o.swiperSlideSize + s.spaceBetween),
                p = -(a - l),
                u = p + t.slidesSizesGrid[e];
              ((p >= 0 && p < t.size - 1) ||
                (u > 1 && u <= t.size) ||
                (p <= 0 && u >= t.size)) &&
                (t.visibleSlides.push(o),
                  t.visibleSlidesIndexes.push(e),
                  r[e].classList.add(s.slideVisibleClass)),
                (o.progress = i ? -c : c),
                (o.originalProgress = i ? -d : d);
            }
          },
          updateProgress: function (e) {
            const t = this;
            if (void 0 === e) {
              const s = t.rtlTranslate ? -1 : 1;
              e = (t && t.translate && t.translate * s) || 0;
            }
            const s = t.params,
              r = t.maxTranslate() - t.minTranslate();
            let { progress: i, isBeginning: n, isEnd: a, progressLoop: o } = t;
            const l = n,
              c = a;
            if (0 === r) (i = 0), (n = !0), (a = !0);
            else {
              i = (e - t.minTranslate()) / r;
              const s = Math.abs(e - t.minTranslate()) < 1,
                o = Math.abs(e - t.maxTranslate()) < 1;
              (n = s || i <= 0), (a = o || i >= 1), s && (i = 0), o && (i = 1);
            }
            if (s.loop) {
              const s = Pe(
                t.slides.filter(
                  (e) => "0" === e.getAttribute("data-swiper-slide-index")
                )[0]
              ),
                r = Pe(
                  t.slides.filter(
                    (e) =>
                      1 * e.getAttribute("data-swiper-slide-index") ==
                      t.slides.length - 1
                  )[0]
                ),
                i = t.slidesGrid[s],
                n = t.slidesGrid[r],
                a = t.slidesGrid[t.slidesGrid.length - 1],
                l = Math.abs(e);
              (o = l >= i ? (l - i) / a : (l + a - n) / a), o > 1 && (o -= 1);
            }
            Object.assign(t, {
              progress: i,
              progressLoop: o,
              isBeginning: n,
              isEnd: a,
            }),
              (s.watchSlidesProgress || (s.centeredSlides && s.autoHeight)) &&
              t.updateSlidesProgress(e),
              n && !l && t.emit("reachBeginning toEdge"),
              a && !c && t.emit("reachEnd toEdge"),
              ((l && !n) || (c && !a)) && t.emit("fromEdge"),
              t.emit("progress", i);
          },
          updateSlidesClasses: function () {
            const e = this,
              { slides: t, params: s, slidesEl: r, activeIndex: i } = e,
              n = e.virtual && s.virtual.enabled,
              a = (e) => Le(r, `.${s.slideClass}${e}, swiper-slide${e}`)[0];
            let o;
            if (
              (t.forEach((e) => {
                e.classList.remove(
                  s.slideActiveClass,
                  s.slideNextClass,
                  s.slidePrevClass
                );
              }),
                n)
            )
              if (s.loop) {
                let t = i - e.virtual.slidesBefore;
                t < 0 && (t = e.virtual.slides.length + t),
                  t >= e.virtual.slides.length &&
                  (t -= e.virtual.slides.length),
                  (o = a(`[data-swiper-slide-index="${t}"]`));
              } else o = a(`[data-swiper-slide-index="${i}"]`);
            else o = t[i];
            if (o) {
              o.classList.add(s.slideActiveClass);
              let e = (function (e, t) {
                const s = [];
                for (; e.nextElementSibling;) {
                  const r = e.nextElementSibling;
                  t ? r.matches(t) && s.push(r) : s.push(r), (e = r);
                }
                return s;
              })(o, `.${s.slideClass}, swiper-slide`)[0];
              s.loop && !e && (e = t[0]),
                e && e.classList.add(s.slideNextClass);
              let r = (function (e, t) {
                const s = [];
                for (; e.previousElementSibling;) {
                  const r = e.previousElementSibling;
                  t ? r.matches(t) && s.push(r) : s.push(r), (e = r);
                }
                return s;
              })(o, `.${s.slideClass}, swiper-slide`)[0];
              s.loop && 0 === !r && (r = t[t.length - 1]),
                r && r.classList.add(s.slidePrevClass);
            }
            e.emitSlidesClasses();
          },
          updateActiveIndex: function (e) {
            const t = this,
              s = t.rtlTranslate ? t.translate : -t.translate,
              {
                snapGrid: r,
                params: i,
                activeIndex: n,
                realIndex: a,
                snapIndex: o,
              } = t;
            let l,
              c = e;
            const d = (e) => {
              let s = e - t.virtual.slidesBefore;
              return (
                s < 0 && (s = t.virtual.slides.length + s),
                s >= t.virtual.slides.length && (s -= t.virtual.slides.length),
                s
              );
            };
            if (
              (void 0 === c &&
                (c = (function (e) {
                  const { slidesGrid: t, params: s } = e,
                    r = e.rtlTranslate ? e.translate : -e.translate;
                  let i;
                  for (let e = 0; e < t.length; e += 1)
                    void 0 !== t[e + 1]
                      ? r >= t[e] && r < t[e + 1] - (t[e + 1] - t[e]) / 2
                        ? (i = e)
                        : r >= t[e] && r < t[e + 1] && (i = e + 1)
                      : r >= t[e] && (i = e);
                  return (
                    s.normalizeSlideIndex && (i < 0 || void 0 === i) && (i = 0),
                    i
                  );
                })(t)),
                r.indexOf(s) >= 0)
            )
              l = r.indexOf(s);
            else {
              const e = Math.min(i.slidesPerGroupSkip, c);
              l = e + Math.floor((c - e) / i.slidesPerGroup);
            }
            if ((l >= r.length && (l = r.length - 1), c === n))
              return (
                l !== o && ((t.snapIndex = l), t.emit("snapIndexChange")),
                void (
                  t.params.loop &&
                  t.virtual &&
                  t.params.virtual.enabled &&
                  (t.realIndex = d(c))
                )
              );
            let p;
            (p =
              t.virtual && i.virtual.enabled && i.loop
                ? d(c)
                : t.slides[c]
                  ? parseInt(
                    t.slides[c].getAttribute("data-swiper-slide-index") || c,
                    10
                  )
                  : c),
              Object.assign(t, {
                snapIndex: l,
                realIndex: p,
                previousIndex: n,
                activeIndex: c,
              }),
              t.emit("activeIndexChange"),
              t.emit("snapIndexChange"),
              a !== p && t.emit("realIndexChange"),
              (t.initialized || t.params.runCallbacksOnInit) &&
              t.emit("slideChange");
          },
          updateClickedSlide: function (e) {
            const t = this,
              s = t.params,
              r = e.closest(`.${s.slideClass}, swiper-slide`);
            let i,
              n = !1;
            if (r)
              for (let e = 0; e < t.slides.length; e += 1)
                if (t.slides[e] === r) {
                  (n = !0), (i = e);
                  break;
                }
            if (!r || !n)
              return (t.clickedSlide = void 0), void (t.clickedIndex = void 0);
            (t.clickedSlide = r),
              t.virtual && t.params.virtual.enabled
                ? (t.clickedIndex = parseInt(
                  r.getAttribute("data-swiper-slide-index"),
                  10
                ))
                : (t.clickedIndex = i),
              s.slideToClickedSlide &&
              void 0 !== t.clickedIndex &&
              t.clickedIndex !== t.activeIndex &&
              t.slideToClickedSlide();
          },
        };
      function Re({ swiper: e, runCallbacks: t, direction: s, step: r }) {
        const { activeIndex: i, previousIndex: n } = e;
        let a = s;
        if (
          (a || (a = i > n ? "next" : i < n ? "prev" : "reset"),
            e.emit(`transition${r}`),
            t && i !== n)
        ) {
          if ("reset" === a) return void e.emit(`slideResetTransition${r}`);
          e.emit(`slideChangeTransition${r}`),
            "next" === a
              ? e.emit(`slideNextTransition${r}`)
              : e.emit(`slidePrevTransition${r}`);
        }
      }
      var je = {
        slideTo: function (e = 0, t = this.params.speed, s = !0, r, i) {
          "string" == typeof e && (e = parseInt(e, 10));
          const n = this;
          let a = e;
          a < 0 && (a = 0);
          const {
            params: o,
            snapGrid: l,
            slidesGrid: c,
            previousIndex: d,
            activeIndex: p,
            rtlTranslate: u,
            wrapperEl: f,
            enabled: h,
          } = n;
          if (
            (n.animating && o.preventInteractionOnTransition) ||
            (!h && !r && !i)
          )
            return !1;
          const m = Math.min(n.params.slidesPerGroupSkip, a);
          let g = m + Math.floor((a - m) / n.params.slidesPerGroup);
          g >= l.length && (g = l.length - 1);
          const v = -l[g];
          if (o.normalizeSlideIndex)
            for (let e = 0; e < c.length; e += 1) {
              const t = -Math.floor(100 * v),
                s = Math.floor(100 * c[e]),
                r = Math.floor(100 * c[e + 1]);
              void 0 !== c[e + 1]
                ? t >= s && t < r - (r - s) / 2
                  ? (a = e)
                  : t >= s && t < r && (a = e + 1)
                : t >= s && (a = e);
            }
          if (n.initialized && a !== p) {
            if (!n.allowSlideNext && v < n.translate && v < n.minTranslate())
              return !1;
            if (
              !n.allowSlidePrev &&
              v > n.translate &&
              v > n.maxTranslate() &&
              (p || 0) !== a
            )
              return !1;
          }
          let w;
          if (
            (a !== (d || 0) && s && n.emit("beforeSlideChangeStart"),
              n.updateProgress(v),
              (w = a > p ? "next" : a < p ? "prev" : "reset"),
              (u && -v === n.translate) || (!u && v === n.translate))
          )
            return (
              n.updateActiveIndex(a),
              o.autoHeight && n.updateAutoHeight(),
              n.updateSlidesClasses(),
              "slide" !== o.effect && n.setTranslate(v),
              "reset" !== w && (n.transitionStart(s, w), n.transitionEnd(s, w)),
              !1
            );
          if (o.cssMode) {
            const e = n.isHorizontal(),
              s = u ? v : -v;
            if (0 === t) {
              const t = n.virtual && n.params.virtual.enabled;
              t &&
                ((n.wrapperEl.style.scrollSnapType = "none"),
                  (n._immediateVirtual = !0)),
                t && !n._cssModeVirtualInitialSet && n.params.initialSlide > 0
                  ? ((n._cssModeVirtualInitialSet = !0),
                    requestAnimationFrame(() => {
                      f[e ? "scrollLeft" : "scrollTop"] = s;
                    }))
                  : (f[e ? "scrollLeft" : "scrollTop"] = s),
                t &&
                requestAnimationFrame(() => {
                  (n.wrapperEl.style.scrollSnapType = ""),
                    (n._immediateVirtual = !1);
                });
            } else {
              if (!n.support.smoothScroll)
                return (
                  Ee({
                    swiper: n,
                    targetPosition: s,
                    side: e ? "left" : "top",
                  }),
                  !0
                );
              f.scrollTo({
                [e ? "left" : "top"]: s,
                behavior: "smooth",
              });
            }
            return !0;
          }
          return (
            n.setTransition(t),
            n.setTranslate(v),
            n.updateActiveIndex(a),
            n.updateSlidesClasses(),
            n.emit("beforeTransitionStart", t, r),
            n.transitionStart(s, w),
            0 === t
              ? n.transitionEnd(s, w)
              : n.animating ||
              ((n.animating = !0),
                n.onSlideToWrapperTransitionEnd ||
                (n.onSlideToWrapperTransitionEnd = function (e) {
                  n &&
                    !n.destroyed &&
                    e.target === this &&
                    (n.wrapperEl.removeEventListener(
                      "transitionend",
                      n.onSlideToWrapperTransitionEnd
                    ),
                      (n.onSlideToWrapperTransitionEnd = null),
                      delete n.onSlideToWrapperTransitionEnd,
                      n.transitionEnd(s, w));
                }),
                n.wrapperEl.addEventListener(
                  "transitionend",
                  n.onSlideToWrapperTransitionEnd
                )),
            !0
          );
        },
        slideToLoop: function (e = 0, t = this.params.speed, s = !0, r) {
          "string" == typeof e && (e = parseInt(e, 10));
          const i = this;
          let n = e;
          return (
            i.params.loop &&
            (i.virtual && i.params.virtual.enabled
              ? (n += i.virtual.slidesBefore)
              : (n = Pe(
                i.slides.filter(
                  (e) => 1 * e.getAttribute("data-swiper-slide-index") === n
                )[0]
              ))),
            i.slideTo(n, t, s, r)
          );
        },
        slideNext: function (e = this.params.speed, t = !0, s) {
          const r = this,
            { enabled: i, params: n, animating: a } = r;
          if (!i) return r;
          let o = n.slidesPerGroup;
          "auto" === n.slidesPerView &&
            1 === n.slidesPerGroup &&
            n.slidesPerGroupAuto &&
            (o = Math.max(r.slidesPerViewDynamic("current", !0), 1));
          const l = r.activeIndex < n.slidesPerGroupSkip ? 1 : o,
            c = r.virtual && n.virtual.enabled;
          if (n.loop) {
            if (a && !c && n.loopPreventsSliding) return !1;
            r.loopFix({
              direction: "next",
            }),
              (r._clientLeft = r.wrapperEl.clientLeft);
          }
          return n.rewind && r.isEnd
            ? r.slideTo(0, e, t, s)
            : r.slideTo(r.activeIndex + l, e, t, s);
        },
        slidePrev: function (e = this.params.speed, t = !0, s) {
          const r = this,
            {
              params: i,
              snapGrid: n,
              slidesGrid: a,
              rtlTranslate: o,
              enabled: l,
              animating: c,
            } = r;
          if (!l) return r;
          const d = r.virtual && i.virtual.enabled;
          if (i.loop) {
            if (c && !d && i.loopPreventsSliding) return !1;
            r.loopFix({
              direction: "prev",
            }),
              (r._clientLeft = r.wrapperEl.clientLeft);
          }
          function p(e) {
            return e < 0 ? -Math.floor(Math.abs(e)) : Math.floor(e);
          }
          const u = p(o ? r.translate : -r.translate),
            f = n.map((e) => p(e));
          let h = n[f.indexOf(u) - 1];
          if (void 0 === h && i.cssMode) {
            let e;
            n.forEach((t, s) => {
              u >= t && (e = s);
            }),
              void 0 !== e && (h = n[e > 0 ? e - 1 : e]);
          }
          let m = 0;
          if (
            (void 0 !== h &&
              ((m = a.indexOf(h)),
                m < 0 && (m = r.activeIndex - 1),
                "auto" === i.slidesPerView &&
                1 === i.slidesPerGroup &&
                i.slidesPerGroupAuto &&
                ((m = m - r.slidesPerViewDynamic("previous", !0) + 1),
                  (m = Math.max(m, 0)))),
              i.rewind && r.isBeginning)
          ) {
            const i =
              r.params.virtual && r.params.virtual.enabled && r.virtual
                ? r.virtual.slides.length - 1
                : r.slides.length - 1;
            return r.slideTo(i, e, t, s);
          }
          return r.slideTo(m, e, t, s);
        },
        slideReset: function (e = this.params.speed, t = !0, s) {
          return this.slideTo(this.activeIndex, e, t, s);
        },
        slideToClosest: function (e = this.params.speed, t = !0, s, r = 0.5) {
          const i = this;
          let n = i.activeIndex;
          const a = Math.min(i.params.slidesPerGroupSkip, n),
            o = a + Math.floor((n - a) / i.params.slidesPerGroup),
            l = i.rtlTranslate ? i.translate : -i.translate;
          if (l >= i.snapGrid[o]) {
            const e = i.snapGrid[o];
            l - e > (i.snapGrid[o + 1] - e) * r &&
              (n += i.params.slidesPerGroup);
          } else {
            const e = i.snapGrid[o - 1];
            l - e <= (i.snapGrid[o] - e) * r && (n -= i.params.slidesPerGroup);
          }
          return (
            (n = Math.max(n, 0)),
            (n = Math.min(n, i.slidesGrid.length - 1)),
            i.slideTo(n, e, t, s)
          );
        },
        slideToClickedSlide: function () {
          const e = this,
            { params: t, slidesEl: s } = e,
            r =
              "auto" === t.slidesPerView
                ? e.slidesPerViewDynamic()
                : t.slidesPerView;
          let i,
            n = e.clickedIndex;
          const a = e.isElement ? "swiper-slide" : `.${t.slideClass}`;
          if (t.loop) {
            if (e.animating) return;
            (i = parseInt(
              e.clickedSlide.getAttribute("data-swiper-slide-index"),
              10
            )),
              t.centeredSlides
                ? n < e.loopedSlides - r / 2 ||
                  n > e.slides.length - e.loopedSlides + r / 2
                  ? (e.loopFix(),
                    (n = Pe(Le(s, `${a}[data-swiper-slide-index="${i}"]`)[0])),
                    be(() => {
                      e.slideTo(n);
                    }))
                  : e.slideTo(n)
                : n > e.slides.length - r
                  ? (e.loopFix(),
                    (n = Pe(Le(s, `${a}[data-swiper-slide-index="${i}"]`)[0])),
                    be(() => {
                      e.slideTo(n);
                    }))
                  : e.slideTo(n);
          } else e.slideTo(n);
        },
      };
      function Be(e) {
        const t = this,
          s = ge(),
          r = we(),
          i = t.touchEventsData;
        i.evCache.push(e);
        const { params: n, touches: a, enabled: o } = t;
        if (!o) return;
        if (!n.simulateTouch && "mouse" === e.pointerType) return;
        if (t.animating && n.preventInteractionOnTransition) return;
        !t.animating && n.cssMode && n.loop && t.loopFix();
        let l = e;
        l.originalEvent && (l = l.originalEvent);
        let c = l.target;
        if ("wrapper" === n.touchEventsTarget && !t.wrapperEl.contains(c))
          return;
        if ("which" in l && 3 === l.which) return;
        if ("button" in l && l.button > 0) return;
        if (i.isTouched && i.isMoved) return;
        const d = !!n.noSwipingClass && "" !== n.noSwipingClass,
          p = e.composedPath ? e.composedPath() : e.path;
        d && l.target && l.target.shadowRoot && p && (c = p[0]);
        const u = n.noSwipingSelector
          ? n.noSwipingSelector
          : `.${n.noSwipingClass}`,
          f = !(!l.target || !l.target.shadowRoot);
        if (
          n.noSwiping &&
          (f
            ? (function (e, t = this) {
              return (function t(s) {
                if (!s || s === ge() || s === we()) return null;
                s.assignedSlot && (s = s.assignedSlot);
                const r = s.closest(e);
                return r || s.getRootNode
                  ? r || t(s.getRootNode().host)
                  : null;
              })(t);
            })(u, c)
            : c.closest(u))
        )
          return void (t.allowClick = !0);
        if (n.swipeHandler && !c.closest(n.swipeHandler)) return;
        (a.currentX = l.pageX), (a.currentY = l.pageY);
        const h = a.currentX,
          m = a.currentY,
          g = n.edgeSwipeDetection || n.iOSEdgeSwipeDetection,
          v = n.edgeSwipeThreshold || n.iOSEdgeSwipeThreshold;
        if (g && (h <= v || h >= r.innerWidth - v)) {
          if ("prevent" !== g) return;
          e.preventDefault();
        }
        Object.assign(i, {
          isTouched: !0,
          isMoved: !1,
          allowTouchCallbacks: !0,
          isScrolling: void 0,
          startMoving: void 0,
        }),
          (a.startX = h),
          (a.startY = m),
          (i.touchStartTime = ye()),
          (t.allowClick = !0),
          t.updateSize(),
          (t.swipeDirection = void 0),
          n.threshold > 0 && (i.allowThresholdMove = !1);
        let w = !0;
        c.matches(i.focusableElements) &&
          ((w = !1), "SELECT" === c.nodeName && (i.isTouched = !1)),
          s.activeElement &&
          s.activeElement.matches(i.focusableElements) &&
          s.activeElement !== c &&
          s.activeElement.blur();
        const b = w && t.allowTouchMove && n.touchStartPreventDefault;
        (!n.touchStartForcePreventDefault && !b) ||
          c.isContentEditable ||
          l.preventDefault(),
          t.params.freeMode &&
          t.params.freeMode.enabled &&
          t.freeMode &&
          t.animating &&
          !n.cssMode &&
          t.freeMode.onTouchStart(),
          t.emit("touchStart", l);
      }
      function De(e) {
        const t = ge(),
          s = this,
          r = s.touchEventsData,
          { params: i, touches: n, rtlTranslate: a, enabled: o } = s;
        if (!o) return;
        if (!i.simulateTouch && "mouse" === e.pointerType) return;
        let l = e;
        if ((l.originalEvent && (l = l.originalEvent), !r.isTouched))
          return void (
            r.startMoving &&
            r.isScrolling &&
            s.emit("touchMoveOpposite", l)
          );
        const c = r.evCache.findIndex((e) => e.pointerId === l.pointerId);
        c >= 0 && (r.evCache[c] = l);
        const d = r.evCache.length > 1 ? r.evCache[0] : l,
          p = d.pageX,
          u = d.pageY;
        if (l.preventedByNestedSwiper)
          return (n.startX = p), void (n.startY = u);
        if (!s.allowTouchMove)
          return (
            l.target.matches(r.focusableElements) || (s.allowClick = !1),
            void (
              r.isTouched &&
              (Object.assign(n, {
                startX: p,
                startY: u,
                prevX: s.touches.currentX,
                prevY: s.touches.currentY,
                currentX: p,
                currentY: u,
              }),
                (r.touchStartTime = ye()))
            )
          );
        if (i.touchReleaseOnEdges && !i.loop)
          if (s.isVertical()) {
            if (
              (u < n.startY && s.translate <= s.maxTranslate()) ||
              (u > n.startY && s.translate >= s.minTranslate())
            )
              return (r.isTouched = !1), void (r.isMoved = !1);
          } else if (
            (p < n.startX && s.translate <= s.maxTranslate()) ||
            (p > n.startX && s.translate >= s.minTranslate())
          )
            return;
        if (
          t.activeElement &&
          l.target === t.activeElement &&
          l.target.matches(r.focusableElements)
        )
          return (r.isMoved = !0), void (s.allowClick = !1);
        if (
          (r.allowTouchCallbacks && s.emit("touchMove", l),
            l.targetTouches && l.targetTouches.length > 1)
        )
          return;
        (n.currentX = p), (n.currentY = u);
        const f = n.currentX - n.startX,
          h = n.currentY - n.startY;
        if (
          s.params.threshold &&
          Math.sqrt(f ** 2 + h ** 2) < s.params.threshold
        )
          return;
        if (void 0 === r.isScrolling) {
          let e;
          (s.isHorizontal() && n.currentY === n.startY) ||
            (s.isVertical() && n.currentX === n.startX)
            ? (r.isScrolling = !1)
            : f * f + h * h >= 25 &&
            ((e = (180 * Math.atan2(Math.abs(h), Math.abs(f))) / Math.PI),
              (r.isScrolling = s.isHorizontal()
                ? e > i.touchAngle
                : 90 - e > i.touchAngle));
        }
        if (
          (r.isScrolling && s.emit("touchMoveOpposite", l),
            void 0 === r.startMoving &&
            ((n.currentX === n.startX && n.currentY === n.startY) ||
              (r.startMoving = !0)),
            r.isScrolling ||
            (s.zoom &&
              s.params.zoom &&
              s.params.zoom.enabled &&
              r.evCache.length > 1))
        )
          return void (r.isTouched = !1);
        if (!r.startMoving) return;
        (s.allowClick = !1),
          !i.cssMode && l.cancelable && l.preventDefault(),
          i.touchMoveStopPropagation && !i.nested && l.stopPropagation();
        let m = s.isHorizontal() ? f : h,
          g = s.isHorizontal()
            ? n.currentX - n.previousX
            : n.currentY - n.previousY;
        i.oneWayMovement &&
          ((m = Math.abs(m) * (a ? 1 : -1)), (g = Math.abs(g) * (a ? 1 : -1))),
          (n.diff = m),
          (m *= i.touchRatio),
          a && ((m = -m), (g = -g));
        const v = s.touchesDirection;
        (s.swipeDirection = m > 0 ? "prev" : "next"),
          (s.touchesDirection = g > 0 ? "prev" : "next");
        const w = s.params.loop && !i.cssMode;
        if (!r.isMoved) {
          if (
            (w &&
              s.loopFix({
                direction: s.swipeDirection,
              }),
              (r.startTranslate = s.getTranslate()),
              s.setTransition(0),
              s.animating)
          ) {
            const e = new window.CustomEvent("transitionend", {
              bubbles: !0,
              cancelable: !0,
            });
            s.wrapperEl.dispatchEvent(e);
          }
          (r.allowMomentumBounce = !1),
            !i.grabCursor ||
            (!0 !== s.allowSlideNext && !0 !== s.allowSlidePrev) ||
            s.setGrabCursor(!0),
            s.emit("sliderFirstMove", l);
        }
        let b;
        r.isMoved &&
          v !== s.touchesDirection &&
          w &&
          Math.abs(m) >= 1 &&
          (s.loopFix({
            direction: s.swipeDirection,
            setTranslate: !0,
          }),
            (b = !0)),
          s.emit("sliderMove", l),
          (r.isMoved = !0),
          (r.currentTranslate = m + r.startTranslate);
        let y = !0,
          S = i.resistanceRatio;
        if (
          (i.touchReleaseOnEdges && (S = 0),
            m > 0
              ? (w &&
                !b &&
                r.currentTranslate >
                (i.centeredSlides
                  ? s.minTranslate() - s.size / 2
                  : s.minTranslate()) &&
                s.loopFix({
                  direction: "prev",
                  setTranslate: !0,
                  activeSlideIndex: 0,
                }),
                r.currentTranslate > s.minTranslate() &&
                ((y = !1),
                  i.resistance &&
                  (r.currentTranslate =
                    s.minTranslate() -
                    1 +
                    (-s.minTranslate() + r.startTranslate + m) ** S)))
              : m < 0 &&
              (w &&
                !b &&
                r.currentTranslate <
                (i.centeredSlides
                  ? s.maxTranslate() + s.size / 2
                  : s.maxTranslate()) &&
                s.loopFix({
                  direction: "next",
                  setTranslate: !0,
                  activeSlideIndex:
                    s.slides.length -
                    ("auto" === i.slidesPerView
                      ? s.slidesPerViewDynamic()
                      : Math.ceil(parseFloat(i.slidesPerView, 10))),
                }),
                r.currentTranslate < s.maxTranslate() &&
                ((y = !1),
                  i.resistance &&
                  (r.currentTranslate =
                    s.maxTranslate() +
                    1 -
                    (s.maxTranslate() - r.startTranslate - m) ** S))),
            y && (l.preventedByNestedSwiper = !0),
            !s.allowSlideNext &&
            "next" === s.swipeDirection &&
            r.currentTranslate < r.startTranslate &&
            (r.currentTranslate = r.startTranslate),
            !s.allowSlidePrev &&
            "prev" === s.swipeDirection &&
            r.currentTranslate > r.startTranslate &&
            (r.currentTranslate = r.startTranslate),
            s.allowSlidePrev ||
            s.allowSlideNext ||
            (r.currentTranslate = r.startTranslate),
            i.threshold > 0)
        ) {
          if (!(Math.abs(m) > i.threshold || r.allowThresholdMove))
            return void (r.currentTranslate = r.startTranslate);
          if (!r.allowThresholdMove)
            return (
              (r.allowThresholdMove = !0),
              (n.startX = n.currentX),
              (n.startY = n.currentY),
              (r.currentTranslate = r.startTranslate),
              void (n.diff = s.isHorizontal()
                ? n.currentX - n.startX
                : n.currentY - n.startY)
            );
        }
        i.followFinger &&
          !i.cssMode &&
          (((i.freeMode && i.freeMode.enabled && s.freeMode) ||
            i.watchSlidesProgress) &&
            (s.updateActiveIndex(), s.updateSlidesClasses()),
            s.params.freeMode &&
            i.freeMode.enabled &&
            s.freeMode &&
            s.freeMode.onTouchMove(),
            s.updateProgress(r.currentTranslate),
            s.setTranslate(r.currentTranslate));
      }
      function Ne(e) {
        const t = this,
          s = t.touchEventsData,
          r = s.evCache.findIndex((t) => t.pointerId === e.pointerId);
        if (
          (r >= 0 && s.evCache.splice(r, 1),
            ["pointercancel", "pointerout", "pointerleave"].includes(e.type))
        )
          return;
        const {
          params: i,
          touches: n,
          rtlTranslate: a,
          slidesGrid: o,
          enabled: l,
        } = t;
        if (!l) return;
        if (!i.simulateTouch && "mouse" === e.pointerType) return;
        let c = e;
        if (
          (c.originalEvent && (c = c.originalEvent),
            s.allowTouchCallbacks && t.emit("touchEnd", c),
            (s.allowTouchCallbacks = !1),
            !s.isTouched)
        )
          return (
            s.isMoved && i.grabCursor && t.setGrabCursor(!1),
            (s.isMoved = !1),
            void (s.startMoving = !1)
          );
        i.grabCursor &&
          s.isMoved &&
          s.isTouched &&
          (!0 === t.allowSlideNext || !0 === t.allowSlidePrev) &&
          t.setGrabCursor(!1);
        const d = ye(),
          p = d - s.touchStartTime;
        if (t.allowClick) {
          const e = c.path || (c.composedPath && c.composedPath());
          t.updateClickedSlide((e && e[0]) || c.target),
            t.emit("tap click", c),
            p < 300 &&
            d - s.lastClickTime < 300 &&
            t.emit("doubleTap doubleClick", c);
        }
        if (
          ((s.lastClickTime = ye()),
            be(() => {
              t.destroyed || (t.allowClick = !0);
            }),
            !s.isTouched ||
            !s.isMoved ||
            !t.swipeDirection ||
            0 === n.diff ||
            s.currentTranslate === s.startTranslate)
        )
          return (
            (s.isTouched = !1), (s.isMoved = !1), void (s.startMoving = !1)
          );
        let u;
        if (
          ((s.isTouched = !1),
            (s.isMoved = !1),
            (s.startMoving = !1),
            (u = i.followFinger
              ? a
                ? t.translate
                : -t.translate
              : -s.currentTranslate),
            i.cssMode)
        )
          return;
        if (t.params.freeMode && i.freeMode.enabled)
          return void t.freeMode.onTouchEnd({
            currentPos: u,
          });
        let f = 0,
          h = t.slidesSizesGrid[0];
        for (
          let e = 0;
          e < o.length;
          e += e < i.slidesPerGroupSkip ? 1 : i.slidesPerGroup
        ) {
          const t = e < i.slidesPerGroupSkip - 1 ? 1 : i.slidesPerGroup;
          void 0 !== o[e + t]
            ? u >= o[e] && u < o[e + t] && ((f = e), (h = o[e + t] - o[e]))
            : u >= o[e] && ((f = e), (h = o[o.length - 1] - o[o.length - 2]));
        }
        let m = null,
          g = null;
        i.rewind &&
          (t.isBeginning
            ? (g =
              t.params.virtual && t.params.virtual.enabled && t.virtual
                ? t.virtual.slides.length - 1
                : t.slides.length - 1)
            : t.isEnd && (m = 0));
        const v = (u - o[f]) / h,
          w = f < i.slidesPerGroupSkip - 1 ? 1 : i.slidesPerGroup;
        if (p > i.longSwipesMs) {
          if (!i.longSwipes) return void t.slideTo(t.activeIndex);
          "next" === t.swipeDirection &&
            (v >= i.longSwipesRatio
              ? t.slideTo(i.rewind && t.isEnd ? m : f + w)
              : t.slideTo(f)),
            "prev" === t.swipeDirection &&
            (v > 1 - i.longSwipesRatio
              ? t.slideTo(f + w)
              : null !== g && v < 0 && Math.abs(v) > i.longSwipesRatio
                ? t.slideTo(g)
                : t.slideTo(f));
        } else {
          if (!i.shortSwipes) return void t.slideTo(t.activeIndex);
          !t.navigation ||
            (c.target !== t.navigation.nextEl && c.target !== t.navigation.prevEl)
            ? ("next" === t.swipeDirection && t.slideTo(null !== m ? m : f + w),
              "prev" === t.swipeDirection && t.slideTo(null !== g ? g : f))
            : c.target === t.navigation.nextEl
              ? t.slideTo(f + w)
              : t.slideTo(f);
        }
      }
      let Fe;
      function qe() {
        const e = this,
          { params: t, el: s } = e;
        if (s && 0 === s.offsetWidth) return;
        t.breakpoints && e.setBreakpoint();
        const { allowSlideNext: r, allowSlidePrev: i, snapGrid: n } = e,
          a = e.virtual && e.params.virtual.enabled;
        (e.allowSlideNext = !0),
          (e.allowSlidePrev = !0),
          e.updateSize(),
          e.updateSlides(),
          e.updateSlidesClasses();
        const o = a && t.loop;
        !("auto" === t.slidesPerView || t.slidesPerView > 1) ||
          !e.isEnd ||
          e.isBeginning ||
          e.params.centeredSlides ||
          o
          ? e.params.loop && !a
            ? e.slideToLoop(e.realIndex, 0, !1, !0)
            : e.slideTo(e.activeIndex, 0, !1, !0)
          : e.slideTo(e.slides.length - 1, 0, !1, !0),
          e.autoplay &&
          e.autoplay.running &&
          e.autoplay.paused &&
          (clearTimeout(Fe),
            (Fe = setTimeout(() => {
              e.autoplay.resume();
            }, 500))),
          (e.allowSlidePrev = i),
          (e.allowSlideNext = r),
          e.params.watchOverflow && n !== e.snapGrid && e.checkOverflow();
      }
      function Ue(e) {
        const t = this;
        t.enabled &&
          (t.allowClick ||
            (t.params.preventClicks && e.preventDefault(),
              t.params.preventClicksPropagation &&
              t.animating &&
              (e.stopPropagation(), e.stopImmediatePropagation())));
      }
      function Ve() {
        const e = this,
          { wrapperEl: t, rtlTranslate: s, enabled: r } = e;
        if (!r) return;
        let i;
        (e.previousTranslate = e.translate),
          e.isHorizontal()
            ? (e.translate = -t.scrollLeft)
            : (e.translate = -t.scrollTop),
          0 === e.translate && (e.translate = 0),
          e.updateActiveIndex(),
          e.updateSlidesClasses();
        const n = e.maxTranslate() - e.minTranslate();
        (i = 0 === n ? 0 : (e.translate - e.minTranslate()) / n),
          i !== e.progress && e.updateProgress(s ? -e.translate : e.translate),
          e.emit("setTranslate", e.translate, !1);
      }
      const He = (e, t) => {
        if (!e || e.destroyed || !e.params) return;
        const s = t.closest(
          e.isElement ? "swiper-slide" : `.${e.params.slideClass}`
        );
        if (s) {
          const t = s.querySelector(`.${e.params.lazyPreloaderClass}`);
          t && t.remove();
        }
      };
      function We(e) {
        He(this, e.target), this.update();
      }
      let Ye = !1;
      function Xe() { }
      const Ke = (e, t) => {
        const s = ge(),
          { params: r, el: i, wrapperEl: n, device: a } = e,
          o = !!r.nested,
          l = "on" === t ? "addEventListener" : "removeEventListener",
          c = t;
        i[l]("pointerdown", e.onTouchStart, {
          passive: !1,
        }),
          s[l]("pointermove", e.onTouchMove, {
            passive: !1,
            capture: o,
          }),
          s[l]("pointerup", e.onTouchEnd, {
            passive: !0,
          }),
          s[l]("pointercancel", e.onTouchEnd, {
            passive: !0,
          }),
          s[l]("pointerout", e.onTouchEnd, {
            passive: !0,
          }),
          s[l]("pointerleave", e.onTouchEnd, {
            passive: !0,
          }),
          (r.preventClicks || r.preventClicksPropagation) &&
          i[l]("click", e.onClick, !0),
          r.cssMode && n[l]("scroll", e.onScroll),
          r.updateOnWindowResize
            ? e[c](
              a.ios || a.android
                ? "resize orientationchange observerUpdate"
                : "resize observerUpdate",
              qe,
              !0
            )
            : e[c]("observerUpdate", qe, !0),
          i[l]("load", e.onLoad, {
            capture: !0,
          });
      };
      const Ze = (e, t) => e.grid && t.grid && t.grid.rows > 1;
      var Qe = {
        init: !0,
        direction: "horizontal",
        oneWayMovement: !1,
        touchEventsTarget: "wrapper",
        initialSlide: 0,
        speed: 300,
        cssMode: !1,
        updateOnWindowResize: !0,
        resizeObserver: !0,
        nested: !1,
        createElements: !1,
        enabled: !0,
        focusableElements:
          "input, select, option, textarea, button, video, label",
        width: null,
        height: null,
        preventInteractionOnTransition: !1,
        userAgent: null,
        url: null,
        edgeSwipeDetection: !1,
        edgeSwipeThreshold: 20,
        autoHeight: !1,
        setWrapperSize: !1,
        virtualTranslate: !1,
        effect: "slide",
        breakpoints: void 0,
        breakpointsBase: "window",
        spaceBetween: 0,
        slidesPerView: 1,
        slidesPerGroup: 1,
        slidesPerGroupSkip: 0,
        slidesPerGroupAuto: !1,
        centeredSlides: !1,
        centeredSlidesBounds: !1,
        slidesOffsetBefore: 0,
        slidesOffsetAfter: 0,
        normalizeSlideIndex: !0,
        centerInsufficientSlides: !1,
        watchOverflow: !0,
        roundLengths: !1,
        touchRatio: 1,
        touchAngle: 45,
        simulateTouch: !0,
        shortSwipes: !0,
        longSwipes: !0,
        longSwipesRatio: 0.5,
        longSwipesMs: 300,
        followFinger: !0,
        allowTouchMove: !0,
        threshold: 5,
        touchMoveStopPropagation: !1,
        touchStartPreventDefault: !0,
        touchStartForcePreventDefault: !1,
        touchReleaseOnEdges: !1,
        uniqueNavElements: !0,
        resistance: !0,
        resistanceRatio: 0.85,
        watchSlidesProgress: !1,
        grabCursor: !1,
        preventClicks: !0,
        preventClicksPropagation: !0,
        slideToClickedSlide: !1,
        loop: !1,
        loopedSlides: null,
        loopPreventsSliding: !0,
        rewind: !1,
        allowSlidePrev: !0,
        allowSlideNext: !0,
        swipeHandler: null,
        noSwiping: !0,
        noSwipingClass: "swiper-no-swiping",
        noSwipingSelector: null,
        passiveListeners: !0,
        maxBackfaceHiddenSlides: 10,
        containerModifierClass: "swiper-",
        slideClass: "swiper-slide",
        slideActiveClass: "swiper-slide-active",
        slideVisibleClass: "swiper-slide-visible",
        slideNextClass: "swiper-slide-next",
        slidePrevClass: "swiper-slide-prev",
        wrapperClass: "swiper-wrapper",
        lazyPreloaderClass: "swiper-lazy-preloader",
        runCallbacksOnInit: !0,
        _emitClasses: !1,
      };
      function Je(e, t) {
        return function (s = {}) {
          const r = Object.keys(s)[0],
            i = s[r];
          "object" == typeof i && null !== i
            ? (["navigation", "pagination", "scrollbar"].indexOf(r) >= 0 &&
              !0 === e[r] &&
              (e[r] = {
                auto: !0,
              }),
              r in e && "enabled" in i
                ? (!0 === e[r] &&
                  (e[r] = {
                    enabled: !0,
                  }),
                  "object" != typeof e[r] ||
                  "enabled" in e[r] ||
                  (e[r].enabled = !0),
                  e[r] ||
                  (e[r] = {
                    enabled: !1,
                  }),
                  xe(t, s))
                : xe(t, s))
            : xe(t, s);
        };
      }
      const et = {
        eventsEmitter: Ge,
        update: $e,
        translate: {
          getTranslate: function (e = this.isHorizontal() ? "x" : "y") {
            const {
              params: t,
              rtlTranslate: s,
              translate: r,
              wrapperEl: i,
            } = this;
            if (t.virtualTranslate) return s ? -r : r;
            if (t.cssMode) return r;
            let n = (function (e, t = "x") {
              const s = we();
              let r, i, n;
              const a = (function (e) {
                const t = we();
                let s;
                return (
                  t.getComputedStyle && (s = t.getComputedStyle(e, null)),
                  !s && e.currentStyle && (s = e.currentStyle),
                  s || (s = e.style),
                  s
                );
              })(e);
              return (
                s.WebKitCSSMatrix
                  ? ((i = a.transform || a.webkitTransform),
                    i.split(",").length > 6 &&
                    (i = i
                      .split(", ")
                      .map((e) => e.replace(",", "."))
                      .join(", ")),
                    (n = new s.WebKitCSSMatrix("none" === i ? "" : i)))
                  : ((n =
                    a.MozTransform ||
                    a.OTransform ||
                    a.MsTransform ||
                    a.msTransform ||
                    a.transform ||
                    a
                      .getPropertyValue("transform")
                      .replace("translate(", "matrix(1, 0, 0, 1,")),
                    (r = n.toString().split(","))),
                "x" === t &&
                (i = s.WebKitCSSMatrix
                  ? n.m41
                  : 16 === r.length
                    ? parseFloat(r[12])
                    : parseFloat(r[4])),
                "y" === t &&
                (i = s.WebKitCSSMatrix
                  ? n.m42
                  : 16 === r.length
                    ? parseFloat(r[13])
                    : parseFloat(r[5])),
                i || 0
              );
            })(i, e);
            return s && (n = -n), n || 0;
          },
          setTranslate: function (e, t) {
            const s = this,
              { rtlTranslate: r, params: i, wrapperEl: n, progress: a } = s;
            let o,
              l = 0,
              c = 0;
            s.isHorizontal() ? (l = r ? -e : e) : (c = e),
              i.roundLengths && ((l = Math.floor(l)), (c = Math.floor(c))),
              i.cssMode
                ? (n[s.isHorizontal() ? "scrollLeft" : "scrollTop"] =
                  s.isHorizontal() ? -l : -c)
                : i.virtualTranslate ||
                (n.style.transform = `translate3d(${l}px, ${c}px, 0px)`),
              (s.previousTranslate = s.translate),
              (s.translate = s.isHorizontal() ? l : c);
            const d = s.maxTranslate() - s.minTranslate();
            (o = 0 === d ? 0 : (e - s.minTranslate()) / d),
              o !== a && s.updateProgress(e),
              s.emit("setTranslate", s.translate, t);
          },
          minTranslate: function () {
            return -this.snapGrid[0];
          },
          maxTranslate: function () {
            return -this.snapGrid[this.snapGrid.length - 1];
          },
          translateTo: function (
            e = 0,
            t = this.params.speed,
            s = !0,
            r = !0,
            i
          ) {
            const n = this,
              { params: a, wrapperEl: o } = n;
            if (n.animating && a.preventInteractionOnTransition) return !1;
            const l = n.minTranslate(),
              c = n.maxTranslate();
            let d;
            if (
              ((d = r && e > l ? l : r && e < c ? c : e),
                n.updateProgress(d),
                a.cssMode)
            ) {
              const e = n.isHorizontal();
              if (0 === t) o[e ? "scrollLeft" : "scrollTop"] = -d;
              else {
                if (!n.support.smoothScroll)
                  return (
                    Ee({
                      swiper: n,
                      targetPosition: -d,
                      side: e ? "left" : "top",
                    }),
                    !0
                  );
                o.scrollTo({
                  [e ? "left" : "top"]: -d,
                  behavior: "smooth",
                });
              }
              return !0;
            }
            return (
              0 === t
                ? (n.setTransition(0),
                  n.setTranslate(d),
                  s &&
                  (n.emit("beforeTransitionStart", t, i),
                    n.emit("transitionEnd")))
                : (n.setTransition(t),
                  n.setTranslate(d),
                  s &&
                  (n.emit("beforeTransitionStart", t, i),
                    n.emit("transitionStart")),
                  n.animating ||
                  ((n.animating = !0),
                    n.onTranslateToWrapperTransitionEnd ||
                    (n.onTranslateToWrapperTransitionEnd = function (e) {
                      n &&
                        !n.destroyed &&
                        e.target === this &&
                        (n.wrapperEl.removeEventListener(
                          "transitionend",
                          n.onTranslateToWrapperTransitionEnd
                        ),
                          (n.onTranslateToWrapperTransitionEnd = null),
                          delete n.onTranslateToWrapperTransitionEnd,
                          s && n.emit("transitionEnd"));
                    }),
                    n.wrapperEl.addEventListener(
                      "transitionend",
                      n.onTranslateToWrapperTransitionEnd
                    ))),
              !0
            );
          },
        },
        transition: {
          setTransition: function (e, t) {
            const s = this;
            s.params.cssMode ||
              (s.wrapperEl.style.transitionDuration = `${e}ms`),
              s.emit("setTransition", e, t);
          },
          transitionStart: function (e = !0, t) {
            const s = this,
              { params: r } = s;
            r.cssMode ||
              (r.autoHeight && s.updateAutoHeight(),
                Re({
                  swiper: s,
                  runCallbacks: e,
                  direction: t,
                  step: "Start",
                }));
          },
          transitionEnd: function (e = !0, t) {
            const s = this,
              { params: r } = s;
            (s.animating = !1),
              r.cssMode ||
              (s.setTransition(0),
                Re({
                  swiper: s,
                  runCallbacks: e,
                  direction: t,
                  step: "End",
                }));
          },
        },
        slide: je,
        loop: {
          loopCreate: function (e) {
            const t = this,
              { params: s, slidesEl: r } = t;
            !s.loop ||
              (t.virtual && t.params.virtual.enabled) ||
              (Le(r, `.${s.slideClass}, swiper-slide`).forEach((e, t) => {
                e.setAttribute("data-swiper-slide-index", t);
              }),
                t.loopFix({
                  slideRealIndex: e,
                  direction: s.centeredSlides ? void 0 : "next",
                }));
          },
          loopFix: function ({
            slideRealIndex: e,
            slideTo: t = !0,
            direction: s,
            setTranslate: r,
            activeSlideIndex: i,
            byController: n,
            byMousewheel: a,
          } = {}) {
            const o = this;
            if (!o.params.loop) return;
            o.emit("beforeLoopFix");
            const {
              slides: l,
              allowSlidePrev: c,
              allowSlideNext: d,
              slidesEl: p,
              params: u,
            } = o;
            if (
              ((o.allowSlidePrev = !0),
                (o.allowSlideNext = !0),
                o.virtual && u.virtual.enabled)
            )
              return (
                t &&
                (u.centeredSlides || 0 !== o.snapIndex
                  ? u.centeredSlides && o.snapIndex < u.slidesPerView
                    ? o.slideTo(
                      o.virtual.slides.length + o.snapIndex,
                      0,
                      !1,
                      !0
                    )
                    : o.snapIndex === o.snapGrid.length - 1 &&
                    o.slideTo(o.virtual.slidesBefore, 0, !1, !0)
                  : o.slideTo(o.virtual.slides.length, 0, !1, !0)),
                (o.allowSlidePrev = c),
                (o.allowSlideNext = d),
                void o.emit("loopFix")
              );
            const f =
              "auto" === u.slidesPerView
                ? o.slidesPerViewDynamic()
                : Math.ceil(parseFloat(u.slidesPerView, 10));
            let h = u.loopedSlides || f;
            h % u.slidesPerGroup != 0 &&
              (h += u.slidesPerGroup - (h % u.slidesPerGroup)),
              (o.loopedSlides = h);
            const m = [],
              g = [];
            let v = o.activeIndex;
            void 0 === i
              ? (i = Pe(
                o.slides.filter((e) =>
                  e.classList.contains("swiper-slide-active")
                )[0]
              ))
              : (v = i);
            const w = "next" === s || !s,
              b = "prev" === s || !s;
            let y = 0,
              S = 0;
            if (i < h) {
              y = h - i;
              for (let e = 0; e < h - i; e += 1) {
                const t = e - Math.floor(e / l.length) * l.length;
                m.push(l.length - t - 1);
              }
            } else if (i > o.slides.length - 2 * h) {
              S = i - (o.slides.length - 2 * h);
              for (let e = 0; e < S; e += 1) {
                const t = e - Math.floor(e / l.length) * l.length;
                g.push(t);
              }
            }
            if (
              (b &&
                m.forEach((e) => {
                  p.prepend(o.slides[e]);
                }),
                w &&
                g.forEach((e) => {
                  p.append(o.slides[e]);
                }),
                o.recalcSlides(),
                u.watchSlidesProgress && o.updateSlidesOffset(),
                t)
            )
              if (m.length > 0 && b)
                if (void 0 === e) {
                  const e = o.slidesGrid[v],
                    t = o.slidesGrid[v + y] - e;
                  a
                    ? o.setTranslate(o.translate - t)
                    : (o.slideTo(v + y, 0, !1, !0),
                      r &&
                      (o.touches[o.isHorizontal() ? "startX" : "startY"] +=
                        t));
                } else r && o.slideToLoop(e, 0, !1, !0);
              else if (g.length > 0 && w)
                if (void 0 === e) {
                  const e = o.slidesGrid[v],
                    t = o.slidesGrid[v - S] - e;
                  a
                    ? o.setTranslate(o.translate - t)
                    : (o.slideTo(v - S, 0, !1, !0),
                      r &&
                      (o.touches[o.isHorizontal() ? "startX" : "startY"] +=
                        t));
                } else o.slideToLoop(e, 0, !1, !0);
            if (
              ((o.allowSlidePrev = c),
                (o.allowSlideNext = d),
                o.controller && o.controller.control && !n)
            ) {
              const t = {
                slideRealIndex: e,
                slideTo: !1,
                direction: s,
                setTranslate: r,
                activeSlideIndex: i,
                byController: !0,
              };
              Array.isArray(o.controller.control)
                ? o.controller.control.forEach((e) => {
                  e.params.loop && e.loopFix(t);
                })
                : o.controller.control instanceof o.constructor &&
                o.controller.control.params.loop &&
                o.controller.control.loopFix(t);
            }
            o.emit("loopFix");
          },
          loopDestroy: function () {
            const e = this,
              { slides: t, params: s, slidesEl: r } = e;
            if (!s.loop || (e.virtual && e.params.virtual.enabled)) return;
            e.recalcSlides();
            const i = [];
            t.forEach((e) => {
              const t =
                void 0 === e.swiperSlideIndex
                  ? 1 * e.getAttribute("data-swiper-slide-index")
                  : e.swiperSlideIndex;
              i[t] = e;
            }),
              t.forEach((e) => {
                e.removeAttribute("data-swiper-slide-index");
              }),
              i.forEach((e) => {
                r.append(e);
              }),
              e.recalcSlides(),
              e.slideTo(e.realIndex, 0);
          },
        },
        grabCursor: {
          setGrabCursor: function (e) {
            const t = this;
            if (
              !t.params.simulateTouch ||
              (t.params.watchOverflow && t.isLocked) ||
              t.params.cssMode
            )
              return;
            const s =
              "container" === t.params.touchEventsTarget ? t.el : t.wrapperEl;
            (s.style.cursor = "move"),
              (s.style.cursor = e ? "grabbing" : "grab");
          },
          unsetGrabCursor: function () {
            const e = this;
            (e.params.watchOverflow && e.isLocked) ||
              e.params.cssMode ||
              (e[
                "container" === e.params.touchEventsTarget
                  ? "el"
                  : "wrapperEl"
              ].style.cursor = "");
          },
        },
        events: {
          attachEvents: function () {
            const e = this,
              t = ge(),
              { params: s } = e;
            (e.onTouchStart = Be.bind(e)),
              (e.onTouchMove = De.bind(e)),
              (e.onTouchEnd = Ne.bind(e)),
              s.cssMode && (e.onScroll = Ve.bind(e)),
              (e.onClick = Ue.bind(e)),
              (e.onLoad = We.bind(e)),
              Ye || (t.addEventListener("touchstart", Xe), (Ye = !0)),
              Ke(e, "on");
          },
          detachEvents: function () {
            Ke(this, "off");
          },
        },
        breakpoints: {
          setBreakpoint: function () {
            const e = this,
              { realIndex: t, initialized: s, params: r, el: i } = e,
              n = r.breakpoints;
            if (!n || (n && 0 === Object.keys(n).length)) return;
            const a = e.getBreakpoint(n, e.params.breakpointsBase, e.el);
            if (!a || e.currentBreakpoint === a) return;
            const o = (a in n ? n[a] : void 0) || e.originalParams,
              l = Ze(e, r),
              c = Ze(e, o),
              d = r.enabled;
            l && !c
              ? (i.classList.remove(
                `${r.containerModifierClass}grid`,
                `${r.containerModifierClass}grid-column`
              ),
                e.emitContainerClasses())
              : !l &&
              c &&
              (i.classList.add(`${r.containerModifierClass}grid`),
                ((o.grid.fill && "column" === o.grid.fill) ||
                  (!o.grid.fill && "column" === r.grid.fill)) &&
                i.classList.add(`${r.containerModifierClass}grid-column`),
                e.emitContainerClasses()),
              ["navigation", "pagination", "scrollbar"].forEach((t) => {
                const s = r[t] && r[t].enabled,
                  i = o[t] && o[t].enabled;
                s && !i && e[t].disable(), !s && i && e[t].enable();
              });
            const p = o.direction && o.direction !== r.direction,
              u = r.loop && (o.slidesPerView !== r.slidesPerView || p);
            p && s && e.changeDirection(), xe(e.params, o);
            const f = e.params.enabled;
            Object.assign(e, {
              allowTouchMove: e.params.allowTouchMove,
              allowSlideNext: e.params.allowSlideNext,
              allowSlidePrev: e.params.allowSlidePrev,
            }),
              d && !f ? e.disable() : !d && f && e.enable(),
              (e.currentBreakpoint = a),
              e.emit("_beforeBreakpoint", o),
              u && s && (e.loopDestroy(), e.loopCreate(t), e.updateSlides()),
              e.emit("breakpoint", o);
          },
          getBreakpoint: function (e, t = "window", s) {
            if (!e || ("container" === t && !s)) return;
            let r = !1;
            const i = we(),
              n = "window" === t ? i.innerHeight : s.clientHeight,
              a = Object.keys(e).map((e) => {
                if ("string" == typeof e && 0 === e.indexOf("@")) {
                  const t = parseFloat(e.substr(1));
                  return {
                    value: n * t,
                    point: e,
                  };
                }
                return {
                  value: e,
                  point: e,
                };
              });
            a.sort((e, t) => parseInt(e.value, 10) - parseInt(t.value, 10));
            for (let e = 0; e < a.length; e += 1) {
              const { point: n, value: o } = a[e];
              "window" === t
                ? i.matchMedia(`(min-width: ${o}px)`).matches && (r = n)
                : o <= s.clientWidth && (r = n);
            }
            return r || "max";
          },
        },
        checkOverflow: {
          checkOverflow: function () {
            const e = this,
              { isLocked: t, params: s } = e,
              { slidesOffsetBefore: r } = s;
            if (r) {
              const t = e.slides.length - 1,
                s = e.slidesGrid[t] + e.slidesSizesGrid[t] + 2 * r;
              e.isLocked = e.size > s;
            } else e.isLocked = 1 === e.snapGrid.length;
            !0 === s.allowSlideNext && (e.allowSlideNext = !e.isLocked),
              !0 === s.allowSlidePrev && (e.allowSlidePrev = !e.isLocked),
              t && t !== e.isLocked && (e.isEnd = !1),
              t !== e.isLocked && e.emit(e.isLocked ? "lock" : "unlock");
          },
        },
        classes: {
          addClasses: function () {
            const e = this,
              { classNames: t, params: s, rtl: r, el: i, device: n } = e,
              a = (function (e, t) {
                const s = [];
                return (
                  e.forEach((e) => {
                    "object" == typeof e
                      ? Object.keys(e).forEach((r) => {
                        e[r] && s.push(t + r);
                      })
                      : "string" == typeof e && s.push(t + e);
                  }),
                  s
                );
              })(
                [
                  "initialized",
                  s.direction,
                  {
                    "free-mode": e.params.freeMode && s.freeMode.enabled,
                  },
                  {
                    autoheight: s.autoHeight,
                  },
                  {
                    rtl: r,
                  },
                  {
                    grid: s.grid && s.grid.rows > 1,
                  },
                  {
                    "grid-column":
                      s.grid && s.grid.rows > 1 && "column" === s.grid.fill,
                  },
                  {
                    android: n.android,
                  },
                  {
                    ios: n.ios,
                  },
                  {
                    "css-mode": s.cssMode,
                  },
                  {
                    centered: s.cssMode && s.centeredSlides,
                  },
                  {
                    "watch-progress": s.watchSlidesProgress,
                  },
                ],
                s.containerModifierClass
              );
            t.push(...a), i.classList.add(...t), e.emitContainerClasses();
          },
          removeClasses: function () {
            const { el: e, classNames: t } = this;
            e.classList.remove(...t), this.emitContainerClasses();
          },
        },
      },
        tt = {};
      class st {
        constructor(...e) {
          let t, s;
          1 === e.length &&
            e[0].constructor &&
            "Object" === Object.prototype.toString.call(e[0]).slice(8, -1)
            ? (s = e[0])
            : ([t, s] = e),
            s || (s = {}),
            (s = xe({}, s)),
            t && !s.el && (s.el = t);
          const r = ge();
          if (
            s.el &&
            "string" == typeof s.el &&
            r.querySelectorAll(s.el).length > 1
          ) {
            const e = [];
            return (
              r.querySelectorAll(s.el).forEach((t) => {
                const r = xe({}, s, {
                  el: t,
                });
                e.push(new st(r));
              }),
              e
            );
          }
          const i = this;
          (i.__swiper__ = !0),
            (i.support = _e()),
            (i.device = (function (e = {}) {
              return (
                Ie ||
                (Ie = (function ({ userAgent: e } = {}) {
                  const t = _e(),
                    s = we(),
                    r = s.navigator.platform,
                    i = e || s.navigator.userAgent,
                    n = {
                      ios: !1,
                      android: !1,
                    },
                    a = s.screen.width,
                    o = s.screen.height,
                    l = i.match(/(Android);?[\s\/]+([\d.]+)?/);
                  let c = i.match(/(iPad).*OS\s([\d_]+)/);
                  const d = i.match(/(iPod)(.*OS\s([\d_]+))?/),
                    p = !c && i.match(/(iPhone\sOS|iOS)\s([\d_]+)/),
                    u = "Win32" === r;
                  let f = "MacIntel" === r;
                  return (
                    !c &&
                    f &&
                    t.touch &&
                    [
                      "1024x1366",
                      "1366x1024",
                      "834x1194",
                      "1194x834",
                      "834x1112",
                      "1112x834",
                      "768x1024",
                      "1024x768",
                      "820x1180",
                      "1180x820",
                      "810x1080",
                      "1080x810",
                    ].indexOf(`${a}x${o}`) >= 0 &&
                    ((c = i.match(/(Version)\/([\d.]+)/)),
                      c || (c = [0, 1, "13_0_0"]),
                      (f = !1)),
                    l && !u && ((n.os = "android"), (n.android = !0)),
                    (c || p || d) && ((n.os = "ios"), (n.ios = !0)),
                    n
                  );
                })(e)),
                Ie
              );
            })({
              userAgent: s.userAgent,
            })),
            (i.browser =
              (ze ||
                (ze = (function () {
                  const e = we();
                  let t = !1;
                  function s() {
                    const t = e.navigator.userAgent.toLowerCase();
                    return (
                      t.indexOf("safari") >= 0 &&
                      t.indexOf("chrome") < 0 &&
                      t.indexOf("android") < 0
                    );
                  }
                  if (s()) {
                    const s = String(e.navigator.userAgent);
                    if (s.includes("Version/")) {
                      const [e, r] = s
                        .split("Version/")[1]
                        .split(" ")[0]
                        .split(".")
                        .map((e) => Number(e));
                      t = e < 16 || (16 === e && r < 2);
                    }
                  }
                  return {
                    isSafari: t || s(),
                    needPerspectiveFix: t,
                    isWebView:
                      /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(
                        e.navigator.userAgent
                      ),
                  };
                })()),
                ze)),
            (i.eventsListeners = {}),
            (i.eventsAnyListeners = []),
            (i.modules = [...i.__modules__]),
            s.modules &&
            Array.isArray(s.modules) &&
            i.modules.push(...s.modules);
          const n = {};
          i.modules.forEach((e) => {
            e({
              params: s,
              swiper: i,
              extendParams: Je(s, n),
              on: i.on.bind(i),
              once: i.once.bind(i),
              off: i.off.bind(i),
              emit: i.emit.bind(i),
            });
          });
          const a = xe({}, Qe, n);
          return (
            (i.params = xe({}, a, tt, s)),
            (i.originalParams = xe({}, i.params)),
            (i.passedParams = xe({}, s)),
            i.params &&
            i.params.on &&
            Object.keys(i.params.on).forEach((e) => {
              i.on(e, i.params.on[e]);
            }),
            i.params && i.params.onAny && i.onAny(i.params.onAny),
            Object.assign(i, {
              enabled: i.params.enabled,
              el: t,
              classNames: [],
              slides: [],
              slidesGrid: [],
              snapGrid: [],
              slidesSizesGrid: [],
              isHorizontal() {
                return "horizontal" === i.params.direction;
              },
              isVertical() {
                return "vertical" === i.params.direction;
              },
              activeIndex: 0,
              realIndex: 0,
              isBeginning: !0,
              isEnd: !1,
              translate: 0,
              previousTranslate: 0,
              progress: 0,
              velocity: 0,
              animating: !1,
              allowSlideNext: i.params.allowSlideNext,
              allowSlidePrev: i.params.allowSlidePrev,
              touchEventsData: {
                isTouched: void 0,
                isMoved: void 0,
                allowTouchCallbacks: void 0,
                touchStartTime: void 0,
                isScrolling: void 0,
                currentTranslate: void 0,
                startTranslate: void 0,
                allowThresholdMove: void 0,
                focusableElements: i.params.focusableElements,
                lastClickTime: ye(),
                clickTimeout: void 0,
                velocities: [],
                allowMomentumBounce: void 0,
                startMoving: void 0,
                evCache: [],
              },
              allowClick: !0,
              allowTouchMove: i.params.allowTouchMove,
              touches: {
                startX: 0,
                startY: 0,
                currentX: 0,
                currentY: 0,
                diff: 0,
              },
              imagesToLoad: [],
              imagesLoaded: 0,
            }),
            i.emit("_swiper"),
            i.params.init && i.init(),
            i
          );
        }
        recalcSlides() {
          const { slidesEl: e, params: t } = this;
          this.slides = Le(e, `.${t.slideClass}, swiper-slide`);
        }
        enable() {
          const e = this;
          e.enabled ||
            ((e.enabled = !0),
              e.params.grabCursor && e.setGrabCursor(),
              e.emit("enable"));
        }
        disable() {
          const e = this;
          e.enabled &&
            ((e.enabled = !1),
              e.params.grabCursor && e.unsetGrabCursor(),
              e.emit("disable"));
        }
        setProgress(e, t) {
          const s = this;
          e = Math.min(Math.max(e, 0), 1);
          const r = s.minTranslate(),
            i = (s.maxTranslate() - r) * e + r;
          s.translateTo(i, void 0 === t ? 0 : t),
            s.updateActiveIndex(),
            s.updateSlidesClasses();
        }
        emitContainerClasses() {
          const e = this;
          if (!e.params._emitClasses || !e.el) return;
          const t = e.el.className
            .split(" ")
            .filter(
              (t) =>
                0 === t.indexOf("swiper") ||
                0 === t.indexOf(e.params.containerModifierClass)
            );
          e.emit("_containerClasses", t.join(" "));
        }
        getSlideClasses(e) {
          const t = this;
          return t.destroyed
            ? ""
            : e.className
              .split(" ")
              .filter(
                (e) =>
                  0 === e.indexOf("swiper-slide") ||
                  0 === e.indexOf(t.params.slideClass)
              )
              .join(" ");
        }
        emitSlidesClasses() {
          const e = this;
          if (!e.params._emitClasses || !e.el) return;
          const t = [];
          e.slides.forEach((s) => {
            const r = e.getSlideClasses(s);
            t.push({
              slideEl: s,
              classNames: r,
            }),
              e.emit("_slideClass", s, r);
          }),
            e.emit("_slideClasses", t);
        }
        slidesPerViewDynamic(e = "current", t = !1) {
          const {
            params: s,
            slides: r,
            slidesGrid: i,
            slidesSizesGrid: n,
            size: a,
            activeIndex: o,
          } = this;
          let l = 1;
          if (s.centeredSlides) {
            let e,
              t = r[o].swiperSlideSize;
            for (let s = o + 1; s < r.length; s += 1)
              r[s] &&
                !e &&
                ((t += r[s].swiperSlideSize), (l += 1), t > a && (e = !0));
            for (let s = o - 1; s >= 0; s -= 1)
              r[s] &&
                !e &&
                ((t += r[s].swiperSlideSize), (l += 1), t > a && (e = !0));
          } else if ("current" === e)
            for (let e = o + 1; e < r.length; e += 1)
              (t ? i[e] + n[e] - i[o] < a : i[e] - i[o] < a) && (l += 1);
          else for (let e = o - 1; e >= 0; e -= 1) i[o] - i[e] < a && (l += 1);
          return l;
        }
        update() {
          const e = this;
          if (!e || e.destroyed) return;
          const { snapGrid: t, params: s } = e;
          function r() {
            const t = e.rtlTranslate ? -1 * e.translate : e.translate,
              s = Math.min(Math.max(t, e.maxTranslate()), e.minTranslate());
            e.setTranslate(s), e.updateActiveIndex(), e.updateSlidesClasses();
          }
          let i;
          s.breakpoints && e.setBreakpoint(),
            [...e.el.querySelectorAll('[loading="lazy"]')].forEach((t) => {
              t.complete && He(e, t);
            }),
            e.updateSize(),
            e.updateSlides(),
            e.updateProgress(),
            e.updateSlidesClasses(),
            e.params.freeMode && e.params.freeMode.enabled
              ? (r(), e.params.autoHeight && e.updateAutoHeight())
              : ((i =
                ("auto" === e.params.slidesPerView ||
                  e.params.slidesPerView > 1) &&
                  e.isEnd &&
                  !e.params.centeredSlides
                  ? e.slideTo(e.slides.length - 1, 0, !1, !0)
                  : e.slideTo(e.activeIndex, 0, !1, !0)),
                i || r()),
            s.watchOverflow && t !== e.snapGrid && e.checkOverflow(),
            e.emit("update");
        }
        changeDirection(e, t = !0) {
          const s = this,
            r = s.params.direction;
          return (
            e || (e = "horizontal" === r ? "vertical" : "horizontal"),
            e === r ||
            ("horizontal" !== e && "vertical" !== e) ||
            (s.el.classList.remove(`${s.params.containerModifierClass}${r}`),
              s.el.classList.add(`${s.params.containerModifierClass}${e}`),
              s.emitContainerClasses(),
              (s.params.direction = e),
              s.slides.forEach((t) => {
                "vertical" === e ? (t.style.width = "") : (t.style.height = "");
              }),
              s.emit("changeDirection"),
              t && s.update()),
            s
          );
        }
        changeLanguageDirection(e) {
          const t = this;
          (t.rtl && "rtl" === e) ||
            (!t.rtl && "ltr" === e) ||
            ((t.rtl = "rtl" === e),
              (t.rtlTranslate = "horizontal" === t.params.direction && t.rtl),
              t.rtl
                ? (t.el.classList.add(`${t.params.containerModifierClass}rtl`),
                  (t.el.dir = "rtl"))
                : (t.el.classList.remove(`${t.params.containerModifierClass}rtl`),
                  (t.el.dir = "ltr")),
              t.update());
        }
        mount(e) {
          const t = this;
          if (t.mounted) return !0;
          let s = e || t.params.el;
          if (("string" == typeof s && (s = document.querySelector(s)), !s))
            return !1;
          (s.swiper = t), s.shadowEl && (t.isElement = !0);
          const r = () =>
            `.${(t.params.wrapperClass || "").trim().split(" ").join(".")}`;
          let i =
            s && s.shadowRoot && s.shadowRoot.querySelector
              ? s.shadowRoot.querySelector(r())
              : Le(s, r())[0];
          return (
            !i &&
            t.params.createElements &&
            ((i = Ce("div", t.params.wrapperClass)),
              s.append(i),
              Le(s, `.${t.params.slideClass}`).forEach((e) => {
                i.append(e);
              })),
            Object.assign(t, {
              el: s,
              wrapperEl: i,
              slidesEl: t.isElement ? s : i,
              mounted: !0,
              rtl:
                "rtl" === s.dir.toLowerCase() || "rtl" === Me(s, "direction"),
              rtlTranslate:
                "horizontal" === t.params.direction &&
                ("rtl" === s.dir.toLowerCase() || "rtl" === Me(s, "direction")),
              wrongRTL: "-webkit-box" === Me(i, "display"),
            }),
            !0
          );
        }
        init(e) {
          const t = this;
          return (
            t.initialized ||
            !1 === t.mount(e) ||
            (t.emit("beforeInit"),
              t.params.breakpoints && t.setBreakpoint(),
              t.addClasses(),
              t.updateSize(),
              t.updateSlides(),
              t.params.watchOverflow && t.checkOverflow(),
              t.params.grabCursor && t.enabled && t.setGrabCursor(),
              t.params.loop && t.virtual && t.params.virtual.enabled
                ? t.slideTo(
                  t.params.initialSlide + t.virtual.slidesBefore,
                  0,
                  t.params.runCallbacksOnInit,
                  !1,
                  !0
                )
                : t.slideTo(
                  t.params.initialSlide,
                  0,
                  t.params.runCallbacksOnInit,
                  !1,
                  !0
                ),
              t.params.loop && t.loopCreate(),
              t.attachEvents(),
              [...t.el.querySelectorAll('[loading="lazy"]')].forEach((e) => {
                e.complete
                  ? He(t, e)
                  : e.addEventListener("load", (e) => {
                    He(t, e.target);
                  });
              }),
              (t.initialized = !0),
              t.emit("init"),
              t.emit("afterInit")),
            t
          );
        }
        destroy(e = !0, t = !0) {
          const s = this,
            { params: r, el: i, wrapperEl: n, slides: a } = s;
          return (
            void 0 === s.params ||
            s.destroyed ||
            (s.emit("beforeDestroy"),
              (s.initialized = !1),
              s.detachEvents(),
              r.loop && s.loopDestroy(),
              t &&
              (s.removeClasses(),
                i.removeAttribute("style"),
                n.removeAttribute("style"),
                a &&
                a.length &&
                a.forEach((e) => {
                  e.classList.remove(
                    r.slideVisibleClass,
                    r.slideActiveClass,
                    r.slideNextClass,
                    r.slidePrevClass
                  ),
                    e.removeAttribute("style"),
                    e.removeAttribute("data-swiper-slide-index");
                })),
              s.emit("destroy"),
              Object.keys(s.eventsListeners).forEach((e) => {
                s.off(e);
              }),
              !1 !== e &&
              ((s.el.swiper = null),
                (function (e) {
                  const t = e;
                  Object.keys(t).forEach((e) => {
                    try {
                      t[e] = null;
                    } catch (e) { }
                    try {
                      delete t[e];
                    } catch (e) { }
                  });
                })(s)),
              (s.destroyed = !0)),
            null
          );
        }
        static extendDefaults(e) {
          xe(tt, e);
        }
        static get extendedDefaults() {
          return tt;
        }
        static get defaults() {
          return Qe;
        }
        static installModule(e) {
          st.prototype.__modules__ || (st.prototype.__modules__ = []);
          const t = st.prototype.__modules__;
          "function" == typeof e && t.indexOf(e) < 0 && t.push(e);
        }
        static use(e) {
          return Array.isArray(e)
            ? (e.forEach((e) => st.installModule(e)), st)
            : (st.installModule(e), st);
        }
      }
      function rt(e, t, s, r) {
        return (
          e.params.createElements &&
          Object.keys(r).forEach((i) => {
            if (!s[i] && !0 === s.auto) {
              let n = Le(e.el, `.${r[i]}`)[0];
              n ||
                ((n = Ce("div", r[i])), (n.className = r[i]), e.el.append(n)),
                (s[i] = n),
                (t[i] = n);
            }
          }),
          s
        );
      }
      function it(e = "") {
        return `.${e
          .trim()
          .replace(/([\.:!\/])/g, "\\$1")
          .replace(/ /g, ".")}`;
      }
      Object.keys(et).forEach((e) => {
        Object.keys(et[e]).forEach((t) => {
          st.prototype[t] = et[e][t];
        });
      }),
        st.use([
          function ({ swiper: e, on: t, emit: s }) {
            const r = we();
            let i = null,
              n = null;
            const a = () => {
              e &&
                !e.destroyed &&
                e.initialized &&
                (s("beforeResize"), s("resize"));
            },
              o = () => {
                e && !e.destroyed && e.initialized && s("orientationchange");
              };
            t("init", () => {
              e.params.resizeObserver && void 0 !== r.ResizeObserver
                ? e &&
                !e.destroyed &&
                e.initialized &&
                ((i = new ResizeObserver((t) => {
                  n = r.requestAnimationFrame(() => {
                    const { width: s, height: r } = e;
                    let i = s,
                      n = r;
                    t.forEach(
                      ({ contentBoxSize: t, contentRect: s, target: r }) => {
                        (r && r !== e.el) ||
                          ((i = s ? s.width : (t[0] || t).inlineSize),
                            (n = s ? s.height : (t[0] || t).blockSize));
                      }
                    ),
                      (i === s && n === r) || a();
                  });
                })),
                  i.observe(e.el))
                : (r.addEventListener("resize", a),
                  r.addEventListener("orientationchange", o));
            }),
              t("destroy", () => {
                n && r.cancelAnimationFrame(n),
                  i && i.unobserve && e.el && (i.unobserve(e.el), (i = null)),
                  r.removeEventListener("resize", a),
                  r.removeEventListener("orientationchange", o);
              });
          },
          function ({ swiper: e, extendParams: t, on: s, emit: r }) {
            const i = [],
              n = we(),
              a = (e, t = {}) => {
                const s = new (n.MutationObserver || n.WebkitMutationObserver)(
                  (e) => {
                    if (1 === e.length) return void r("observerUpdate", e[0]);
                    const t = function () {
                      r("observerUpdate", e[0]);
                    };
                    n.requestAnimationFrame
                      ? n.requestAnimationFrame(t)
                      : n.setTimeout(t, 0);
                  }
                );
                s.observe(e, {
                  attributes: void 0 === t.attributes || t.attributes,
                  childList: void 0 === t.childList || t.childList,
                  characterData: void 0 === t.characterData || t.characterData,
                }),
                  i.push(s);
              };
            t({
              observer: !1,
              observeParents: !1,
              observeSlideChildren: !1,
            }),
              s("init", () => {
                if (e.params.observer) {
                  if (e.params.observeParents) {
                    const t = ke(e.el);
                    for (let e = 0; e < t.length; e += 1) a(t[e]);
                  }
                  a(e.el, {
                    childList: e.params.observeSlideChildren,
                  }),
                    a(e.wrapperEl, {
                      attributes: !1,
                    });
                }
              }),
              s("destroy", () => {
                i.forEach((e) => {
                  e.disconnect();
                }),
                  i.splice(0, i.length);
              });
          },
        ]),
        new st(".swiper", {
          modules: [
            function ({ swiper: e, extendParams: t, on: s, emit: r }) {
              t({
                navigation: {
                  nextEl: null,
                  prevEl: null,
                  hideOnClick: !1,
                  disabledClass: "swiper-button-disabled",
                  hiddenClass: "swiper-button-hidden",
                  lockClass: "swiper-button-lock",
                  navigationDisabledClass: "swiper-navigation-disabled",
                },
              }),
                (e.navigation = {
                  nextEl: null,
                  prevEl: null,
                });
              const i = (e) => (
                Array.isArray(e) || (e = [e].filter((e) => !!e)), e
              );
              function n(t) {
                let s;
                return t &&
                  "string" == typeof t &&
                  e.isElement &&
                  ((s = e.el.shadowRoot.querySelector(t)), s)
                  ? s
                  : (t &&
                    ("string" == typeof t &&
                      (s = [...document.querySelectorAll(t)]),
                      e.params.uniqueNavElements &&
                      "string" == typeof t &&
                      s.length > 1 &&
                      1 === e.el.querySelectorAll(t).length &&
                      (s = e.el.querySelector(t))),
                    t && !s ? t : s);
              }
              function a(t, s) {
                const r = e.params.navigation;
                (t = i(t)).forEach((t) => {
                  t &&
                    (t.classList[s ? "add" : "remove"](
                      ...r.disabledClass.split(" ")
                    ),
                      "BUTTON" === t.tagName && (t.disabled = s),
                      e.params.watchOverflow &&
                      e.enabled &&
                      t.classList[e.isLocked ? "add" : "remove"](r.lockClass));
                });
              }
              function o() {
                const { nextEl: t, prevEl: s } = e.navigation;
                if (e.params.loop) return a(s, !1), void a(t, !1);
                a(s, e.isBeginning && !e.params.rewind),
                  a(t, e.isEnd && !e.params.rewind);
              }
              function l(t) {
                t.preventDefault(),
                  (!e.isBeginning || e.params.loop || e.params.rewind) &&
                  (e.slidePrev(), r("navigationPrev"));
              }
              function c(t) {
                t.preventDefault(),
                  (!e.isEnd || e.params.loop || e.params.rewind) &&
                  (e.slideNext(), r("navigationNext"));
              }
              function d() {
                const t = e.params.navigation;
                if (
                  ((e.params.navigation = rt(
                    e,
                    e.originalParams.navigation,
                    e.params.navigation,
                    {
                      nextEl: "swiper-button-next",
                      prevEl: "swiper-button-prev",
                    }
                  )),
                    !t.nextEl && !t.prevEl)
                )
                  return;
                let s = n(t.nextEl),
                  r = n(t.prevEl);
                Object.assign(e.navigation, {
                  nextEl: s,
                  prevEl: r,
                }),
                  (s = i(s)),
                  (r = i(r));
                const a = (s, r) => {
                  s && s.addEventListener("click", "next" === r ? c : l),
                    !e.enabled &&
                    s &&
                    s.classList.add(...t.lockClass.split(" "));
                };
                s.forEach((e) => a(e, "next")), r.forEach((e) => a(e, "prev"));
              }
              function p() {
                let { nextEl: t, prevEl: s } = e.navigation;
                (t = i(t)), (s = i(s));
                const r = (t, s) => {
                  t.removeEventListener("click", "next" === s ? c : l),
                    t.classList.remove(
                      ...e.params.navigation.disabledClass.split(" ")
                    );
                };
                t.forEach((e) => r(e, "next")), s.forEach((e) => r(e, "prev"));
              }
              s("init", () => {
                !1 === e.params.navigation.enabled ? u() : (d(), o());
              }),
                s("toEdge fromEdge lock unlock", () => {
                  o();
                }),
                s("destroy", () => {
                  p();
                }),
                s("enable disable", () => {
                  let { nextEl: t, prevEl: s } = e.navigation;
                  (t = i(t)),
                    (s = i(s)),
                    [...t, ...s]
                      .filter((e) => !!e)
                      .forEach((t) =>
                        t.classList[e.enabled ? "remove" : "add"](
                          e.params.navigation.lockClass
                        )
                      );
                }),
                s("click", (t, s) => {
                  let { nextEl: n, prevEl: a } = e.navigation;
                  (n = i(n)), (a = i(a));
                  const o = s.target;
                  if (
                    e.params.navigation.hideOnClick &&
                    !a.includes(o) &&
                    !n.includes(o)
                  ) {
                    if (
                      e.pagination &&
                      e.params.pagination &&
                      e.params.pagination.clickable &&
                      (e.pagination.el === o || e.pagination.el.contains(o))
                    )
                      return;
                    let t;
                    n.length
                      ? (t = n[0].classList.contains(
                        e.params.navigation.hiddenClass
                      ))
                      : a.length &&
                      (t = a[0].classList.contains(
                        e.params.navigation.hiddenClass
                      )),
                      r(!0 === t ? "navigationShow" : "navigationHide"),
                      [...n, ...a]
                        .filter((e) => !!e)
                        .forEach((t) =>
                          t.classList.toggle(e.params.navigation.hiddenClass)
                        );
                  }
                });
              const u = () => {
                e.el.classList.add(
                  ...e.params.navigation.navigationDisabledClass.split(" ")
                ),
                  p();
              };
              Object.assign(e.navigation, {
                enable: () => {
                  e.el.classList.remove(
                    ...e.params.navigation.navigationDisabledClass.split(" ")
                  ),
                    d(),
                    o();
                },
                disable: u,
                update: o,
                init: d,
                destroy: p,
              });
            },
            function ({ swiper: e, extendParams: t, on: s, emit: r }) {
              const i = "swiper-pagination";
              let n;
              t({
                pagination: {
                  el: null,
                  bulletElement: "span",
                  clickable: !1,
                  hideOnClick: !1,
                  renderBullet: null,
                  renderProgressbar: null,
                  renderFraction: null,
                  renderCustom: null,
                  progressbarOpposite: !1,
                  type: "bullets",
                  dynamicBullets: !1,
                  dynamicMainBullets: 1,
                  formatFractionCurrent: (e) => e,
                  formatFractionTotal: (e) => e,
                  bulletClass: `${i}-bullet`,
                  bulletActiveClass: `${i}-bullet-active`,
                  modifierClass: `${i}-`,
                  currentClass: `${i}-current`,
                  totalClass: `${i}-total`,
                  hiddenClass: `${i}-hidden`,
                  progressbarFillClass: `${i}-progressbar-fill`,
                  progressbarOppositeClass: `${i}-progressbar-opposite`,
                  clickableClass: `${i}-clickable`,
                  lockClass: `${i}-lock`,
                  horizontalClass: `${i}-horizontal`,
                  verticalClass: `${i}-vertical`,
                  paginationDisabledClass: `${i}-disabled`,
                },
              }),
                (e.pagination = {
                  el: null,
                  bullets: [],
                });
              let a = 0;
              const o = (e) => (
                Array.isArray(e) || (e = [e].filter((e) => !!e)), e
              );
              function l() {
                return (
                  !e.params.pagination.el ||
                  !e.pagination.el ||
                  (Array.isArray(e.pagination.el) &&
                    0 === e.pagination.el.length)
                );
              }
              function c(t, s) {
                const { bulletActiveClass: r } = e.params.pagination;
                t &&
                  (t =
                    t[
                    ("prev" === s ? "previous" : "next") + "ElementSibling"
                    ]) &&
                  (t.classList.add(`${r}-${s}`),
                    (t =
                      t[
                      ("prev" === s ? "previous" : "next") + "ElementSibling"
                      ]) && t.classList.add(`${r}-${s}-${s}`));
              }
              function d(t) {
                const s = t.target.closest(it(e.params.pagination.bulletClass));
                if (!s) return;
                t.preventDefault();
                const r = Pe(s) * e.params.slidesPerGroup;
                e.params.loop ? e.slideToLoop(r) : e.slideTo(r);
              }
              function p() {
                const t = e.rtl,
                  s = e.params.pagination;
                if (l()) return;
                let i,
                  d = e.pagination.el;
                d = o(d);
                const p =
                  e.virtual && e.params.virtual.enabled
                    ? e.virtual.slides.length
                    : e.slides.length,
                  u = e.params.loop
                    ? Math.ceil(p / e.params.slidesPerGroup)
                    : e.snapGrid.length;
                if (
                  ((i = e.params.loop
                    ? e.params.slidesPerGroup > 1
                      ? Math.floor(e.realIndex / e.params.slidesPerGroup)
                      : e.realIndex
                    : void 0 !== e.snapIndex
                      ? e.snapIndex
                      : e.activeIndex || 0),
                    "bullets" === s.type &&
                    e.pagination.bullets &&
                    e.pagination.bullets.length > 0)
                ) {
                  const r = e.pagination.bullets;
                  let o, l, p;
                  if (
                    (s.dynamicBullets &&
                      ((n = Oe(
                        r[0],
                        e.isHorizontal() ? "width" : "height",
                        !0
                      )),
                        d.forEach((t) => {
                          t.style[e.isHorizontal() ? "width" : "height"] =
                            n * (s.dynamicMainBullets + 4) + "px";
                        }),
                        s.dynamicMainBullets > 1 &&
                        void 0 !== e.previousIndex &&
                        ((a += i - (e.previousIndex || 0)),
                          a > s.dynamicMainBullets - 1
                            ? (a = s.dynamicMainBullets - 1)
                            : a < 0 && (a = 0)),
                        (o = Math.max(i - a, 0)),
                        (l = o + (Math.min(r.length, s.dynamicMainBullets) - 1)),
                        (p = (l + o) / 2)),
                      r.forEach((e) => {
                        e.classList.remove(
                          ...[
                            "",
                            "-next",
                            "-next-next",
                            "-prev",
                            "-prev-prev",
                            "-main",
                          ].map((e) => `${s.bulletActiveClass}${e}`)
                        );
                      }),
                      d.length > 1)
                  )
                    r.forEach((e) => {
                      const t = Pe(e);
                      t === i && e.classList.add(s.bulletActiveClass),
                        s.dynamicBullets &&
                        (t >= o &&
                          t <= l &&
                          e.classList.add(`${s.bulletActiveClass}-main`),
                          t === o && c(e, "prev"),
                          t === l && c(e, "next"));
                    });
                  else {
                    const e = r[i];
                    if (
                      (e && e.classList.add(s.bulletActiveClass),
                        s.dynamicBullets)
                    ) {
                      const e = r[o],
                        t = r[l];
                      for (let e = o; e <= l; e += 1)
                        r[e].classList.add(`${s.bulletActiveClass}-main`);
                      c(e, "prev"), c(t, "next");
                    }
                  }
                  if (s.dynamicBullets) {
                    const i = Math.min(r.length, s.dynamicMainBullets + 4),
                      a = (n * i - n) / 2 - p * n,
                      o = t ? "right" : "left";
                    r.forEach((t) => {
                      t.style[e.isHorizontal() ? o : "top"] = `${a}px`;
                    });
                  }
                }
                d.forEach((t, n) => {
                  if (
                    ("fraction" === s.type &&
                      (t.querySelectorAll(it(s.currentClass)).forEach((e) => {
                        e.textContent = s.formatFractionCurrent(i + 1);
                      }),
                        t.querySelectorAll(it(s.totalClass)).forEach((e) => {
                          e.textContent = s.formatFractionTotal(u);
                        })),
                      "progressbar" === s.type)
                  ) {
                    let r;
                    r = s.progressbarOpposite
                      ? e.isHorizontal()
                        ? "vertical"
                        : "horizontal"
                      : e.isHorizontal()
                        ? "horizontal"
                        : "vertical";
                    const n = (i + 1) / u;
                    let a = 1,
                      o = 1;
                    "horizontal" === r ? (a = n) : (o = n),
                      t
                        .querySelectorAll(it(s.progressbarFillClass))
                        .forEach((t) => {
                          (t.style.transform = `translate3d(0,0,0) scaleX(${a}) scaleY(${o})`),
                            (t.style.transitionDuration = `${e.params.speed}ms`);
                        });
                  }
                  "custom" === s.type && s.renderCustom
                    ? ((t.innerHTML = s.renderCustom(e, i + 1, u)),
                      0 === n && r("paginationRender", t))
                    : (0 === n && r("paginationRender", t),
                      r("paginationUpdate", t)),
                    e.params.watchOverflow &&
                    e.enabled &&
                    t.classList[e.isLocked ? "add" : "remove"](s.lockClass);
                });
              }
              function u() {
                const t = e.params.pagination;
                if (l()) return;
                const s =
                  e.virtual && e.params.virtual.enabled
                    ? e.virtual.slides.length
                    : e.slides.length;
                let i = e.pagination.el;
                i = o(i);
                let n = "";
                if ("bullets" === t.type) {
                  let r = e.params.loop
                    ? Math.ceil(s / e.params.slidesPerGroup)
                    : e.snapGrid.length;
                  e.params.freeMode &&
                    e.params.freeMode.enabled &&
                    r > s &&
                    (r = s);
                  for (let s = 0; s < r; s += 1)
                    t.renderBullet
                      ? (n += t.renderBullet.call(e, s, t.bulletClass))
                      : (n += `<${t.bulletElement} class="${t.bulletClass}"></${t.bulletElement}>`);
                }
                "fraction" === t.type &&
                  (n = t.renderFraction
                    ? t.renderFraction.call(e, t.currentClass, t.totalClass)
                    : `<span class="${t.currentClass}"></span> / <span class="${t.totalClass}"></span>`),
                  "progressbar" === t.type &&
                  (n = t.renderProgressbar
                    ? t.renderProgressbar.call(e, t.progressbarFillClass)
                    : `<span class="${t.progressbarFillClass}"></span>`),
                  i.forEach((s) => {
                    "custom" !== t.type && (s.innerHTML = n || ""),
                      "bullets" === t.type &&
                      (e.pagination.bullets = [
                        ...s.querySelectorAll(it(t.bulletClass)),
                      ]);
                  }),
                  "custom" !== t.type && r("paginationRender", i[0]);
              }
              function f() {
                e.params.pagination = rt(
                  e,
                  e.originalParams.pagination,
                  e.params.pagination,
                  {
                    el: "swiper-pagination",
                  }
                );
                const t = e.params.pagination;
                if (!t.el) return;
                let s;
                "string" == typeof t.el &&
                  e.isElement &&
                  (s = e.el.shadowRoot.querySelector(t.el)),
                  s ||
                  "string" != typeof t.el ||
                  (s = [...document.querySelectorAll(t.el)]),
                  s || (s = t.el),
                  s &&
                  0 !== s.length &&
                  (e.params.uniqueNavElements &&
                    "string" == typeof t.el &&
                    Array.isArray(s) &&
                    s.length > 1 &&
                    ((s = [...e.el.querySelectorAll(t.el)]),
                      s.length > 1 &&
                      (s = s.filter((t) => ke(t, ".swiper")[0] === e.el)[0])),
                    Array.isArray(s) && 1 === s.length && (s = s[0]),
                    Object.assign(e.pagination, {
                      el: s,
                    }),
                    (s = o(s)),
                    s.forEach((s) => {
                      "bullets" === t.type &&
                        t.clickable &&
                        s.classList.add(t.clickableClass),
                        s.classList.add(t.modifierClass + t.type),
                        s.classList.add(
                          e.isHorizontal() ? t.horizontalClass : t.verticalClass
                        ),
                        "bullets" === t.type &&
                        t.dynamicBullets &&
                        (s.classList.add(
                          `${t.modifierClass}${t.type}-dynamic`
                        ),
                          (a = 0),
                          t.dynamicMainBullets < 1 &&
                          (t.dynamicMainBullets = 1)),
                        "progressbar" === t.type &&
                        t.progressbarOpposite &&
                        s.classList.add(t.progressbarOppositeClass),
                        t.clickable && s.addEventListener("click", d),
                        e.enabled || s.classList.add(t.lockClass);
                    }));
              }
              function h() {
                const t = e.params.pagination;
                if (l()) return;
                let s = e.pagination.el;
                s &&
                  ((s = o(s)),
                    s.forEach((s) => {
                      s.classList.remove(t.hiddenClass),
                        s.classList.remove(t.modifierClass + t.type),
                        s.classList.remove(
                          e.isHorizontal() ? t.horizontalClass : t.verticalClass
                        ),
                        t.clickable && s.removeEventListener("click", d);
                    })),
                  e.pagination.bullets &&
                  e.pagination.bullets.forEach((e) =>
                    e.classList.remove(t.bulletActiveClass)
                  );
              }
              s("init", () => {
                !1 === e.params.pagination.enabled ? m() : (f(), u(), p());
              }),
                s("activeIndexChange", () => {
                  void 0 === e.snapIndex && p();
                }),
                s("snapIndexChange", () => {
                  p();
                }),
                s("snapGridLengthChange", () => {
                  u(), p();
                }),
                s("destroy", () => {
                  h();
                }),
                s("enable disable", () => {
                  let { el: t } = e.pagination;
                  t &&
                    ((t = o(t)),
                      t.forEach((t) =>
                        t.classList[e.enabled ? "remove" : "add"](
                          e.params.pagination.lockClass
                        )
                      ));
                }),
                s("lock unlock", () => {
                  p();
                }),
                s("click", (t, s) => {
                  const i = s.target;
                  let { el: n } = e.pagination;
                  if (
                    (Array.isArray(n) || (n = [n].filter((e) => !!e)),
                      e.params.pagination.el &&
                      e.params.pagination.hideOnClick &&
                      n &&
                      n.length > 0 &&
                      !i.classList.contains(e.params.pagination.bulletClass))
                  ) {
                    if (
                      e.navigation &&
                      ((e.navigation.nextEl && i === e.navigation.nextEl) ||
                        (e.navigation.prevEl && i === e.navigation.prevEl))
                    )
                      return;
                    const t = n[0].classList.contains(
                      e.params.pagination.hiddenClass
                    );
                    r(!0 === t ? "paginationShow" : "paginationHide"),
                      n.forEach((t) =>
                        t.classList.toggle(e.params.pagination.hiddenClass)
                      );
                  }
                });
              const m = () => {
                e.el.classList.add(e.params.pagination.paginationDisabledClass);
                let { el: t } = e.pagination;
                t &&
                  ((t = o(t)),
                    t.forEach((t) =>
                      t.classList.add(e.params.pagination.paginationDisabledClass)
                    )),
                  h();
              };
              Object.assign(e.pagination, {
                enable: () => {
                  e.el.classList.remove(
                    e.params.pagination.paginationDisabledClass
                  );
                  let { el: t } = e.pagination;
                  t &&
                    ((t = o(t)),
                      t.forEach((t) =>
                        t.classList.remove(
                          e.params.pagination.paginationDisabledClass
                        )
                      )),
                    f(),
                    u(),
                    p();
                },
                disable: m,
                render: u,
                update: p,
                init: f,
                destroy: h,
              });
            },
          ],
          pagination: {
            el: ".swiper-pagination",
            type: "fraction",
          },
          navigation: {
            nextEl: ".swiper-next",
            prevEl: ".swiper-prev",
          },
          breakpoints: {
            900: {
              slidesPerView: 3,
              spaceBetween: 40,
            },
            700: {
              slidesPerView: 2,
              spaceBetween: 40,
              centeredSlides: true,
              loop: true,
            },
            320: {
              slidesPerView: 1,
            },
          },
        }),
        ymaps.ready(function () {
          ymaps.geolocation
            .get({
              provider: "yandex",
            })
            .then(function (e) {
              var t = e.geoObjects.get(0);
              $("input[name=region]").val(t.getAdministrativeAreas()[0]);
            })
            .catch(function (e) {
              console.log("Не удалось установить местоположение", e);
            });
        }),
        $(".phone").mask("+7 (999) 999-99-99"),
        ($.fn.setCursorPosition = function (e) {
          if ($(this).get(0).setSelectionRange)
            $(this).get(0).setSelectionRange(e, e);
          else if ($(this).get(0).createTextRange) {
            var t = $(this).get(0).createTextRange();
            t.collapse(!0),
              t.moveEnd("character", e),
              t.moveStart("character", e),
              t.select();
          }
        }),
        $('input[type="tel"]').click(function () {
          $(this).setCursorPosition(4);
        }),
        document.querySelectorAll("form").forEach(function (e) {
          e.addEventListener("submit", function (t) {
            console.log(t.target), t.preventDefault();
            var s = e.querySelectorAll(".input");
            de(s);
          });
        });
    })();
})();

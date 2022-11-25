window.requestAnimFrame = (function(callback) {
  return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(callback) {
    return window.setTimeout(callback, 1000 / 60);
  };
})();
window.cancelAnimFrame = (function(_id) {
  return window.cancelAnimationFrame || window.cancelRequestAnimationFrame || window.webkitCancelAnimationFrame || window.webkitCancelRequestAnimationFrame || window.mozCancelAnimationFrame || window.mozCancelRequestAnimationFrame || window.msCancelAnimationFrame || window.msCancelRequestAnimationFrame || window.oCancelAnimationFrame || window.oCancelRequestAnimationFrame || function(_id) { window.clearTimeout(id); };
})();

function closest(el, selector) {
  // type el -> Object
  // type select -> String
  var matchesFn;
  // find vendor prefix
  ['matches', 'webkitMatchesSelector', 'mozMatchesSelector', 'msMatchesSelector', 'oMatchesSelector'].some(function(fn) {
    if (typeof document.body[fn] == 'function') {
      matchesFn = fn;
      return true;
    }
    return false;
  })
  var parent;
  // traverse parents
  while (el) {
    parent = el.parentElement;
    if (parent && parent[matchesFn](selector)) {
      return parent;
    }
    el = parent;
  }
  return null;
}

function getCssProperty(elem, property) {
  return window.getComputedStyle(elem, null).getPropertyValue(property);
}
var easingEquations = {
  easeOutSine: function(pos) {
    return Math.sin(pos * (Math.PI / 2));
  },
  easeInOutSine: function(pos) {
    return (-0.5 * (Math.cos(Math.PI * pos) - 1));
  },
  easeInOutQuint: function(pos) {
    if ((pos /= 0.5) < 1) {
      return 0.5 * Math.pow(pos, 5);
    }
    return 0.5 * (Math.pow((pos - 2), 5) + 2);
  }
};

function isPartiallyVisible(el) {
  var elementBoundary = el.getBoundingClientRect();
  var top = elementBoundary.top;
  var bottom = elementBoundary.bottom;
  var height = elementBoundary.height;
  return ((top + height >= 0) && (height + window.innerHeight >= bottom));
}

function isFullyVisible(el) {
  var elementBoundary = el.getBoundingClientRect();
  var top = elementBoundary.top;
  var bottom = elementBoundary.bottom;
  return ((top >= 0) && (bottom <= window.innerHeight));
}

function CreateElementWithClass(elementName, className) {
  var el = document.createElement(elementName);
  el.className = className;
  return el;
}

function createElementWithId(elementName, idName) {
  var el = document.createElement(elementName);
  el.id = idName;
  return el;
}

function getScrollbarWidth() {
  var outer = document.createElement("div");
  outer.style.visibility = "hidden";
  outer.style.width = "100px";
  document.body.appendChild(outer);
  var widthNoScroll = outer.offsetWidth;
  // force scrollbars
  outer.style.overflow = "scroll";
  // add innerdiv
  var inner = document.createElement("div");
  inner.style.width = "100%";
  outer.appendChild(inner);
  var widthWithScroll = inner.offsetWidth;
  // remove divs
  outer.parentNode.removeChild(outer);
  return widthNoScroll - widthWithScroll;
}
var transform = ["transform", "msTransform", "webkitTransform", "mozTransform", "oTransform"];
var flex = ['-webkit-box', '-moz-box', '-ms-flexbox', '-webkit-flex', 'flex'];
var fd = ['flexDirection', '-webkit-flexDirection', '-moz-flexDirection'];
var animatriondelay = ["animationDelay", "-moz-animationDelay", "-wekit-animationDelay"];

function getSupportedPropertyName(properties) {
  for (var i = 0; i < properties.length; i++) {
    if (typeof document.body.style[properties[i]] != "undefined") {
      return properties[i];
    }
  }
  return null;
}
var transformProperty = getSupportedPropertyName(transform);
var flexProperty = getSupportedPropertyName(flex);
var fdProperty = getSupportedPropertyName(fd);
var ad = getSupportedPropertyName(animatriondelay);

function detectIE() {
  var ua = window.navigator.userAgent;
  var msie = ua.indexOf('MSIE ');
  var trident = ua.indexOf('Trident/');
  if (msie > 0 || trident > 0) {
    // IE 10 or older => return version number
    // return 'ie'+parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    return 'ie';
  }
  return false;
}

function detect7() {
  var ua = window.navigator.userAgent;
  var isWin7 = ua.indexOf('Windows NT 6.1');
  if (isWin7 > 0) {
    return 'win7';
  }
  return false;
};

function getPosition(el) {
  var xPos = 0;
  var yPos = 0;
  while (el) {
    if (el.tagName == "BODY") {
      // deal with browser quirks with body/window/document and page scroll
      var xScroll = el.scrollLeft || document.documentElement.scrollLeft;
      var yScroll = el.scrollTop || document.documentElement.scrollTop;
      xPos += (el.offsetLeft - xScroll + el.clientLeft);
      yPos += (el.offsetTop - yScroll + el.clientTop);
    } else {
      // for all other non-BODY elements
      xPos += (el.offsetLeft - el.scrollLeft + el.clientLeft);
      yPos += (el.offsetTop - el.scrollTop + el.clientTop);
    }
    el = el.offsetParent;
  }
  return {
    x: xPos,
    y: yPos
  };
}
/* images pc <---> sp */
(function() {
  var PicturePolyfill = (function() {
    function PicturePolyfill() {
      var _this = this;
      this.pictures = [];
      this.onResize = function() {
        var width = document.body.clientWidth;
        for (var i = 0; i < _this.pictures.length; i = (i + 1)) {
          _this.pictures[i].update(width);
        };
      };
      if ([].includes) return;
      var picture = Array.prototype.slice.call(document.getElementsByTagName('picture'));
      for (var i = 0; i < picture.length; i = (i + 1)) {
        this.pictures.push(new Picture(picture[i]));
      };
      window.addEventListener("resize", this.onResize, false);
      this.onResize();
    }
    return PicturePolyfill;
  }());
  var Picture = (function() {
    function Picture(node) {
      var _this = this;
      this.update = function(width) {
        width <= _this.breakPoint ? _this.toSP() : _this.toPC();
      };
      this.toSP = function() {
        if (_this.isSP) return;
        _this.isSP = true;
        _this.changeSrc();
      };
      this.toPC = function() {
        if (!_this.isSP) return;
        _this.isSP = false;
        _this.changeSrc();
      };
      this.changeSrc = function() {
        var toSrc = _this.isSP ? _this.srcSP : _this.srcPC;
        _this.img.setAttribute('src', toSrc);
      };
      this.img = node.getElementsByTagName('img')[0];
      this.srcPC = this.img.getAttribute('src');
      var source = node.getElementsByTagName('source')[0];
      this.srcSP = source.getAttribute('srcset');
      this.breakPoint = Number(source.getAttribute('media').match(/(\d+)px/)[1]);
      this.isSP = !document.body.clientWidth <= this.breakPoint;
      this.update();
    }
    return Picture;
  }());
  new PicturePolyfill();
}());
var Sticky = (function() {
  function Sticky() {
    var s = this;
    this._target = document.getElementById('header');
    this._nav = document.getElementById('header_nav');
    this._for_sp = function(top) {
      s._target.style.left = 0;
      document.body.style.paddingTop = s._target.clientHeight + 'px';
      if (top >= 0) {
        s._target.classList.add('fixed');
      } else {
        s._target.classList.remove('fixed');
        document.body.style.paddingTop = 0;
      }
    }
    this._for_pc = function(top, left) {
      if (top >= 0) {
        s._target.classList.add('fixed');
        s._target.style.left = -left + 'px';
        document.body.style.paddingTop = s._target.clientHeight + 'px';
      } else {
        s._target.classList.remove('fixed');
        document.body.style.paddingTop = 0;
      }
    }
    this.handling = function() {
      var _top = document.documentElement.scrollTop || document.body.scrollTop;
      var _left = document.documentElement.scrollLeft || document.body.scrollLeft;
      if (window.innerWidth < 769) {
        s._for_sp(_top);
      } else {
        if (!s._target.classList.contains('top')) {
          s._target.classList.remove('fixed')
        }
        s._for_pc(_top, _left);
      }
    }
    window.addEventListener('scroll', s.handling, false);
    window.addEventListener('resize', s.handling, false);
    window.addEventListener('load', s.handling, false);
  }
  return Sticky;
})();
var Search = (function() {
  function Search() {
    var s = this;
    this._target = document.getElementById('search_btn');
    this._input = document.getElementById('search_bar');
    this._target.addEventListener('click', function(e) {
      e.preventDefault();
      if (this.classList.contains('open')) {
        this.classList.remove('open');
        s._input.classList.remove('open');
      } else {
        this.classList.add('open');
        s._input.classList.add('open');
      }
    })
  }
  return Search;
})();
window.addEventListener('DOMContentLoaded', function() {
  if (window.jQuery) window.Velocity = window.jQuery.fn.velocity;
  // if (detectIE()) {
  //   document.body.classList.add(detectIE());
  // }
  // if (detect7()) {
  //   document.body.classList.add(detect7());
  // }
  // scroll left header
  if (window.innerWidth > 768) {
    window.addEventListener('scroll', function(e) {
      var sc = window.pageXOffset || document.documentElement.scrollLeft;
      document.querySelector('#header').style.left = -sc + 'px';
      var _top = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
      if(_top > 0) {
        document.body.classList.add('change');
      } else {
        document.body.classList.remove('change');
      }
    });
  }
  new Menusp();
  new scrollChangeHeader();
  new backToTop();
  new accordion();
  new AnchorLink();
  new tabs();
  if (document.querySelector('#according')) {
    new Tab('according');
  }
});
// tabs
var tabs = (function() {
  function tabs() {
    var e = this;
    this.tabs = document.querySelectorAll('#tabs li a');
    this.tabs_length = this.tabs.length;
    this.handling = function() {
      Array.prototype.map.call(e.tabs, function(obj) {
        obj.addEventListener('click', function(event) {
          event.preventDefault();
          var tab = this.getAttribute('data-tab');
          if (tab.trim() == '') {
            return;
          }
          [].map.call(document.querySelectorAll('ul.tabs li a'), function(el) {
            el.classList.remove('active');
            el.parentNode.classList.remove('active');
          });
          [].map.call(document.querySelectorAll('.tab_content'), function(el) {
            el.classList.remove('active');
          });
          this.classList.add('active');
          this.parentNode.classList.add('active');
          document.querySelector('#' + tab).classList.add('active');
        });
      });
    }
    this.handling();
  }
  return tabs;
})();
/* ===================================================================
Tab
=================================================================== */
var Tab = (function() {
  function Tab(target) {
    var t = this;
    this._target = document.getElementById(target);
    this._eles = this._target.querySelectorAll('a');
    Array.prototype.forEach.call(t._eles, function(el) {
      el.addEventListener('click', function(e) {
        if(window.innerWidth > 768) {
          return;
        }
        e.preventDefault();
        this.parentNode.classList.add('active');
        Array.prototype.forEach.call(t._eles, function(child) {
          if (child != el) {
            child.parentNode.classList.remove('active');
          }
        });
      })
    })
    this._target.addEventListener('click', function() {
      if (this.classList.contains('active')) {
        this.classList.remove('active');
      } else {
        this.classList.add('active');
      }
    });
  }
  return Tab;
})()
//scrollChangeHeader
var scrollChangeHeader = function() {
  sc = this;
  sc.osMain = 0;
  sc.scrollTop = 0;
  sc.init();
}
scrollChangeHeader.prototype = {
  init: function() {
    window.addEventListener('scroll', function() { sc.handle() }, true);
  },
  handle: function() {
    sc.scrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
    if (sc.scrollTop >= 5) {
      if (document.querySelector('#header.home')) {
        document.querySelector('#header.home').classList.remove('top');
      }
      if (window.innerWidth < 769) {
        document.querySelector('.conver').classList.add('active');
      }
    } else {
      if (document.querySelector('#header.home')) {
        document.querySelector('#header.home').classList.add('top');
      }
      if (window.innerWidth < 769) {
        document.querySelector('.conver').classList.remove('active');
      }
    }
  },
}
var accordion = function() {
  acd = this;
  this._targets = document.querySelectorAll('.js_accordion');
  if (!this._targets.length) return;
  this.init();
}
accordion.prototype = {
  init: function() {
    var i = 0 | 0;
    for (i = 0; i < this._targets.length; i = (i + 1) | 0) {
      this._targets[i].addEventListener('click', this.onClickHD, false);
    };
    window.addEventListener('resize', function() {
      for (i = 0; i < acd._targets.length; i = (i + 1) | 0) {
        acd.toogle(acd._targets[i]);
      };
    });
  },
  onClickHD: function(e) {
    e.currentTarget.classList.contains('is_active') ? e.currentTarget.classList.remove('is_active') : e.currentTarget.classList.add('is_active');
    acd.toogle(e.currentTarget);
  },
  toogle: function(item) {
    var rz = item.nextElementSibling;
    if (!item.classList.contains('is_active')) {
      rz.style.maxHeight = null;
    } else {
      rz.style.maxHeight = rz.scrollHeight + "px";
    }
  }
}
var backToTop = function() {
  this._backtt = document.getElementById('back_top');
  if (!this._backtt) return;
  this.init();
}
backToTop.prototype = {
  init: function() {
    this._backtt.addEventListener('click', this.onClickHD, false);
  },
  onClickHD: function() {
    Velocity(document.body, 'scroll', { duration: 1000, delay: 0, easing: 'easeInOutSine', mobileHA: false });
  }
}
// AnchorLink
var AnchorLink = function() {
  ac = this;
  this._targets = document.querySelectorAll('.js_anchorlink');
  if (!this._targets.length) return;
  this.init();
}
AnchorLink.prototype = {
  init: function() {
    var i = 0 | 0;
    for (i = 0; i < this._targets.length; i = (i + 1) | 0) {
      this._targets[i].addEventListener('click', this.onClickHD, false);
    };
  },
  onClickHD: function(e) {
    var _hash = e.currentTarget.getAttribute('href').replace('#', '');
    if (_hash != '') {
      var _target = document.getElementById(_hash) || document.querySelector('.' + _hash);
      var _offset, _loc;
      _loc = window.location.pathname;
      if (window.innerWidth > 768) {
        //m.close();
        Velocity(document.getElementById(_hash), 'scroll', { duration: 800, offset: -90, delay: 0, easing: 'easeInOutSine' });
      } else {
        //m.close();
        var h = document.querySelector('.header_l').scrollHeight;
        Velocity(document.getElementById(_hash), 'scroll', { duration: 800, offset: -h, delay: 0, easing: 'easeInOutSine', mobileHA: false });
      }
      e.preventDefault();
    }
  }
}
// Menusp
var Menusp = function() {
  m = this;
  m._hamburger = document.getElementById('menu_icon');
  m._menu = document.getElementById('header_r');
  m._body = document.querySelector('body');
  m.txt = document.querySelector('.menu_icon i');
  m.str1 = 'メニュー';
  m.str2 = '閉じる';
  m._flag = true;
  m.wH = null;
  m.hHeader = null;
  if (!m._hamburger) return;
  m.init();
}
Menusp.prototype = {
  init: function() {
    window.addEventListener('load', function() { m.Handl() }, true);
    window.addEventListener('resize', function() { m.resize() }, true);
  },
  Handl: function() {
    m.close();
    m._hamburger.addEventListener('click', function() { m.onClick() }, false);
  },
  onClick: function() {
    m.wH = window.innerHeight;
    m.hHeader = document.querySelector('.header_logo').offsetHeight;
    if (m._flag) {
      m._menu.classList.add('active');
      m._hamburger.classList.add('active');
      m._body.style.overflow = 'hidden';
      m._flag = false;
      m._menu.style.height = (m.wH - m.hHeader) + 'px';
      m.txt.innerHTML = '';
      m.txt.innerHTML = m.str2;
    } else {
      m.close();
    }
  },
  close: function() {
    m._body.style.overflow = '';
    m._menu.classList.remove('active');
    m._hamburger.classList.remove('active');
    m._menu.removeAttribute("style");
    m._flag = true;
    m.txt.innerHTML = '';
    m.txt.innerHTML = m.str1;
  },
  resize: function() {
    if (m._hamburger.classList.contains('active')) {
      if (window.innerWidth > 768) {
        m._hamburger.classList.remove('active');
        m._menu.classList.remove('active');
        document.body.style.overflow = 'auto';
        m._menu.style.height = 'auto';
        //document.body.style.paddingTop = document.querySelector('.header').clientHeight + 'px';
        m._menu.style.top = 0;
        m._menu.style.height = 'auto';
      } else {
        m._menu.style.height = window.innerHeight - document.querySelector('.header').clientHeight + 'px';
        m._menu.style.top = document.querySelector('.header').clientHeight - 1 + 'px';
      }
    } else {
      if (window.innerWidth < 769) {
        m._menu.style.height = 0;
      } else {
        m._menu.style.height = 'auto';
      }
    }
  }
}
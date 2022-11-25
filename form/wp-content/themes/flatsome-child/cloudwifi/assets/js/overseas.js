var Map = (function(){
  function Map(){
    var m = this;
    this._target = document.getElementById('map');
    this._areas = this._target.querySelectorAll('.area');
    this._wrapName = this._target.querySelector('.name_area');
    this._name = this._target.querySelectorAll('.name_area li');
    this._event = document.getElementById('tabs').querySelectorAll('li a');
    Array.prototype.forEach.call(m._areas,function(el){
      el.addEventListener('mouseenter',function(){
        this.classList.add('hover');
        var _id = '.'+this.id;
        m._wrapName.querySelector(_id).classList.add('hover');
      })
      el.addEventListener('mouseleave',function(){
        this.classList.remove('hover');
        var _id = '.'+this.id;
        m._wrapName.querySelector(_id).classList.remove('hover');
      })
      el.addEventListener('click',function(){
        this.classList.add('active');
        var _id = '.'+this.id;
        m._wrapName.querySelector(_id).classList.add('active');
        Array.prototype.forEach.call(m._event,function(ev){
          if(ev.dataset.area == el.id) {
            if(!ev.classList.contains('active')){
              ev.click();
              if(window.innerWidth < 769){
                ev.click();
              }
            }
          }
        })
        Array.prototype.filter.call(el.parentNode.children,function(child){
          if(el!=child) {
            child.classList.remove('active');
            var _id = '.'+child.id;
            m._wrapName.querySelector(_id).classList.remove('active');
          }
        })
      })
    })
    Array.prototype.forEach.call(m._name,function(el){
      el.addEventListener('mouseenter',function(){
        this.classList.add('hover');
        var _id = this.dataset.area;
        document.getElementById(_id).classList.add('hover');
      })
      el.addEventListener('mouseleave',function(){
        this.classList.remove('hover');
        var _id = this.dataset.area;
        document.getElementById(_id).classList.remove('hover');
      })
      el.addEventListener('click',function(){
        this.classList.add('active');
        var _id = this.dataset.area;
        document.getElementById(_id).classList.add('active');
        Array.prototype.forEach.call(m._event,function(ev){
          if(ev.dataset.area == _id) {
            if(!ev.classList.contains('active')){
              ev.click();
              if(window.innerWidth < 769){
                ev.click();
              }
            }
          }
        })
        Array.prototype.filter.call(el.parentNode.children,function(child){
          if(el!=child) {
            child.classList.remove('active');
            var _id = child.dataset.area;
            document.getElementById(_id).classList.remove('active');
          }
        })
      })
    })
    Array.prototype.forEach.call(m._event,function(el){
      el.addEventListener('click',function(){
        var _area = el.dataset.area;
        Array.prototype.forEach.call(m._areas,function(el){
          if(el.id == _area) {
            el.classList.add('active');
          } else {
            el.classList.remove('active');
          }
        })
        Array.prototype.forEach.call(m._name,function(el){
          if(el.dataset.area == _area) {
            el.classList.add('active');
          } else {
            el.classList.remove('active');
          }
        })
      })
      el.addEventListener('mouseenter',function(){
        var _area = el.dataset.area;
        Array.prototype.forEach.call(m._areas,function(el){
          if(el.id == _area) {
            el.classList.add('hover');
          } else {
            el.classList.remove('hover');
          }
        })
        Array.prototype.forEach.call(m._name,function(el){
          if(el.dataset.area == _area) {
            el.classList.add('hover');
          } else {
            el.classList.remove('hover');
          }
        })
      })
      el.addEventListener('mouseleave',function(){
        var _area = el.dataset.area;
        Array.prototype.forEach.call(m._areas,function(el){
          el.classList.remove('hover');
        })
        Array.prototype.forEach.call(m._name,function(el){
          el.classList.remove('hover');
        })
      })
    })
  }
  return Map;
})()
window.addEventListener('DOMContentLoaded',function(){
  new Map();
})
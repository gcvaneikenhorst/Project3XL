/* Navbar */
(function() {

  'use strict';

  document.querySelector('.material-design-hamburger__icon').addEventListener(
    'click',
    function() {      
      var child;
      
      this.parentNode.nextElementSibling.classList.toggle('menu--on');
      document.getElementById("menubutton").classList.toggle('material-design-hamburger--on');

      child = this.childNodes[1].classList;

      if (child.contains('material-design-hamburger__icon--to-arrow')) 
      {
        child.remove('material-design-hamburger__icon--to-arrow');
        child.add('material-design-hamburger__icon--from-arrow');
      } 
      else 
      {
        child.remove('material-design-hamburger__icon--from-arrow');
        child.add('material-design-hamburger__icon--to-arrow');
      }

    });
    
    document.querySelector('.container').addEventListener(
    'click',
    function() {     
      var child;  

      child = document.getElementById("hamburger_button").childNodes[1].classList;

      if (child.contains('material-design-hamburger__icon--to-arrow'))
      {
        child.remove('material-design-hamburger__icon--to-arrow');
        child.add('material-design-hamburger__icon--from-arrow');
        
        document.getElementById("hamburger_button").parentNode.nextElementSibling.classList.toggle('menu--on');
        document.getElementById("menubutton").classList.toggle('material-design-hamburger--on');
      }

    });

})();
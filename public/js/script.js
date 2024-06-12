document.addEventListener('DOMContentLoaded', function() {
  var inputs = document.querySelectorAll('.form-inputs');

  inputs.forEach(function(input) {
      var label = input.previousElementSibling;
      if (label && label.classList.contains('form-label')) {
          // Check input value on page load
          if (input.value !== '') {
              label.classList.add('focused');
          }

          // Add event listener for focus event
          input.addEventListener('focus', function() {
              label.classList.add('focused');
          });

          // Add event listener for blur event
          input.addEventListener('blur', function() {
              if (input.value === '') {
                  label.classList.remove('focused');
              }
          });
      }
  });
});

function validationForm() {
    $('.form-control').on('input', function () {
        let input = $(this);
        let name = input.prop('name');
        let errorElement = $('.error-message[data-field="' + name + '"]');
  
        if (input.val().trim() == '') {
          input.removeClass('valid');
          errorElement.text(name + 'is required');
        } else {
          input.addClass('valid');
          errorElement.text('');
  
        }
      })
}

function formatDatePicker(id) {
  $(id).datetimepicker({
    format: 'YYYY-MM-DD'
  })

}
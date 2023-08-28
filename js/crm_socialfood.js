(function ($, Drupal) {
  Drupal.behaviors.crmSocialfoodFormToggle = {
    attach: function (context, settings) {
      // Escucha el cambio en los botones de radio.
      $('input[name="radio_buttons"]').change(function() {
        // Remover la clase "active" de todos los labels.
        $('label.option.active').removeClass('active');

        // Obtener el id del input seleccionado.
        var selectedInputId = $(this).attr('id');

        // Obtener el label asociado al input y agregar la clase "active".
        $('label[for="' + selectedInputId + '"]').addClass('active');

        // Oculta ambos formularios.
        if ($(this).val() === 'form') {
          $('.crm-socialfood-form').show();
          $('.crm-socialfood-user-form').hide();
        } else if ($(this).val() === 'form1') {
          $('.crm-socialfood-form').hide();
          $('.crm-socialfood-user-form').show();
        } else if ($(this).val() === 'form2') {
          $('.crm-socialfood-form').hide();
          $('.crm-socialfood-user-form').hide();
        } else if ($(this).val() === 'form3') {
          $('.crm-socialfood-form').hide();
          $('.crm-socialfood-user-form').hide();
        }
      });

      // Ejecuta el evento change inicial para ocultar un formulario.
      $('input[name="radio_buttons"]:checked').trigger('change');
    }
  };
})(jQuery, Drupal);

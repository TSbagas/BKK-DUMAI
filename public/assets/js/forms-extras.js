/**
 * Form Extras
 */

'use strict';

(function () {
  const textarea = document.querySelector('#autosize-demo'),
    creditCard = document.querySelector('.credit-card-mask'),
    phoneMask = document.querySelector('.phone-number-mask'),
    dateMask = document.querySelector('.date-mask'),
    dateMask1 = document.querySelector('.date-mask1'),
    dateMask2 = document.querySelector('.date-mask2'),
    dateMask3 = document.querySelector('.date-mask3'),
    dateMask4 = document.querySelector('.date-mask4'),
    dateMask5 = document.querySelector('.date-mask5'),
    dateMask6 = document.querySelector('.date-mask6'),
    dateMask7 = document.querySelector('.date-mask7'),
    dateMask8 = document.querySelector('.date-mask8'),
    timeMask = document.querySelector('.time-mask'),
    timeMask1 = document.querySelector('.time-mask1'),
    timeMask2 = document.querySelector('.time-mask2'),
    timeMask3 = document.querySelector('.time-mask3'),
    numeralMask = document.querySelector('.numeral-mask'),
    blockMask = document.querySelector('.block-mask'),
    delimiterMask = document.querySelector('.delimiter-mask'),
    customDelimiter = document.querySelector('.custom-delimiter-mask'),
    prefixMask = document.querySelector('.prefix-mask');

  // Autosize
  // --------------------------------------------------------------------
  if (textarea) {
    autosize(textarea);
  }

  // Cleave JS Input Mask
  // --------------------------------------------------------------------

  // Credit Card
  if (creditCard) {
    new Cleave(creditCard, {
      creditCard: true,
      onCreditCardTypeChanged: function (type) {
        if (type != '' && type != 'unknown') {
          document.querySelector('.card-type').innerHTML =
            '<img src="' + assetsPath + 'img/icons/payments/' + type + '-cc.png" height="28"/>';
        } else {
          document.querySelector('.card-type').innerHTML = '';
        }
      }
    });
  }

  // Phone Number
  if (phoneMask) {
    new Cleave(phoneMask, {
      phone: true,
      phoneRegionCode: 'US'
    });
  }

  // Date
  if (dateMask) {
    new Cleave(dateMask, {
      date: true,
      delimiter: '-',
      datePattern: ['Y', 'm', 'd']
    });
  }
  if (dateMask1) {
    new Cleave(dateMask1, {
      date: true,
      delimiter: '-',
      datePattern: ['Y', 'm', 'd']
    });
  }
  if (dateMask2) {
    new Cleave(dateMask2, {
      date: true,
      delimiter: '-',
      datePattern: ['Y', 'm', 'd']
    });
  }
  if (dateMask3) {
    new Cleave(dateMask3, {
      date: true,
      delimiter: '-',
      datePattern: ['Y', 'm', 'd']
    });
  }
  if (dateMask4) {
    new Cleave(dateMask4, {
      date: true,
      delimiter: '-',
      datePattern: ['Y', 'm', 'd']
    });
  }
  if (dateMask5) {
    new Cleave(dateMask5, {
      date: true,
      delimiter: '-',
      datePattern: ['Y', 'm', 'd']
    });
  }
  if (dateMask6) {
    new Cleave(dateMask6, {
      date: true,
      delimiter: '-',
      datePattern: ['Y', 'm', 'd']
    });
  }
  if (dateMask7) {
    new Cleave(dateMask7, {
      date: true,
      delimiter: '-',
      datePattern: ['Y', 'm', 'd']
    });
  }
  if (dateMask8) {
    new Cleave(dateMask8, {
      date: true,
      delimiter: '-',
      datePattern: ['Y', 'm', 'd']
    });
  }

  // Time
  if (timeMask) {
    new Cleave(timeMask, {
      time: true,
      timePattern: ['h', 'm', 's']
    });
  }
  if (timeMask1) {
    new Cleave(timeMask1, {
      time: true,
      timePattern: ['h', 'm', 's']
    });
  }
  if (timeMask2) {
    new Cleave(timeMask2, {
      time: true,
      timePattern: ['h', 'm', 's']
    });
  }
  if (timeMask3) {
    new Cleave(timeMask3, {
      time: true,
      timePattern: ['h', 'm', 's']
    });
  }

  //Numeral
  if (numeralMask) {
    new Cleave(numeralMask, {
      numeral: true,
      numeralThousandsGroupStyle: 'thousand'
    });
  }

  //Block
  if (blockMask) {
    new Cleave(blockMask, {
      blocks: [4, 3, 3],
      uppercase: true
    });
  }

  // Delimiter
  if (delimiterMask) {
    new Cleave(delimiterMask, {
      delimiter: '·',
      blocks: [3, 3, 3],
      uppercase: true
    });
  }

  // Custom Delimiter
  if (customDelimiter) {
    new Cleave(customDelimiter, {
      delimiters: ['.', '.', '-'],
      blocks: [3, 3, 3, 2],
      uppercase: true
    });
  }

  // Prefix
  if (prefixMask) {
    new Cleave(prefixMask, {
      prefix: '+63',
      blocks: [3, 3, 3, 4],
      uppercase: true
    });
  }
})();

// bootstrap-maxlength & repeater (jquery)
$(function () {
  var maxlengthInput = $('.bootstrap-maxlength-example'),
    formRepeater = $('.form-repeater');

  // Bootstrap Max Length
  // --------------------------------------------------------------------
  if (maxlengthInput.length) {
    maxlengthInput.each(function () {
      $(this).maxlength({
        warningClass: 'label label-success bg-success text-white',
        limitReachedClass: 'label label-danger',
        separator: ' out of ',
        preText: 'You typed ',
        postText: ' chars available.',
        validate: true,
        threshold: +this.getAttribute('maxlength')
      });
    });
  }

  // Form Repeater
  // ! Using jQuery each loop to add dynamic id and class for inputs. You may need to improve it based on form fields.
  // -----------------------------------------------------------------------------------------------------------------

  if (formRepeater.length) {
    var row = 2;
    var col = 1;
    formRepeater.on('submit', function (e) {
      e.preventDefault();
    });
    formRepeater.repeater({
      show: function () {
        var fromControl = $(this).find('.form-control, .form-select');
        var formLabel = $(this).find('.form-label');

        fromControl.each(function (i) {
          var id = 'form-repeater-' + row + '-' + col;
          $(fromControl[i]).attr('id', id);
          $(formLabel[i]).attr('for', id);
          col++;
        });

        row++;

        $(this).slideDown();
      },
      hide: function (e) {
        confirm('Are you sure you want to delete this element?') && $(this).slideUp(e);
      }
    });
  }
});
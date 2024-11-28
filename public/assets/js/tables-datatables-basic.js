/**
 * DataTables Basic
 */

'use strict';

$(function () {
  var dt_basic_table = $('.datatables-basic'),
    dt_basic;

    // DataTable dengan tombol
    if (dt_basic_table.length) {
        dt_basic = dt_basic_table.DataTable({
        // responsive: true,
      ajax: {
        url: '/data', // Ganti dengan URL endpoint API Anda
        dataSrc: '' // Data akan langsung diambil dari array JSON
      },
      columns: [
        { data: 'id' },
        { data: 'no_kkp' },                 // Nomor KKP
        { data: 'no_registrasi_imo' },      // Nomor Registrasi IMO
        { data: 'nama_kapal' },             // Nama Kapal
        { data: 'jenis_kapal' },            // Jenis Kapal
        { data: 'bendera_kapal' },          // Bendera Kapal
        { data: 'berat' },                  // Berat Kapal
        { data: 'pelabuhan_kedatangan' },   // Pelabuhan Kedatangan
        { data: 'pelabuhan_berikutnya' },   // Pelabuhan Berikutnya
        { data: 'jml_abk_wna' },            // Jumlah ABK WNA
        { data: 'jml_abk_wni' },            // Jumlah ABK WNI
        { data: 'jml_penumpang_wna' },      // Jumlah Penumpang WNA
        { data: 'jml_penumpang_wni' },      // Jumlah Penumpang WNI
        { data: 'tanggal_terbit' },         // Tanggal Terbit
        { data: 'jam_terbit' },             // Jam Terbit
        { data: 'nama_penerbit' },          // Nama Penerbit
        { data: 'berlaku_sampai_tanggal' }, // Berlaku Sampai Tanggal
        { data: 'nama_petugas' },           // Nama Petugas
        { data: 'keterangan' },             // Keterangan
        { data: 'tanggal_published' },      // Tanggal Published
        { data: 'qr_code' },                // QR Code
        { data: 'nama_wajib_bayar' },       // Nama Wajib Bayar
        { data: 'npn' },                    // NPN
        { data: 'ntb' },                    // NTB
        { data: 'jam_bayar' }               // Jam Bayar
      ],

      columnDefs: [
        {
          className: 'control',
          orderable: true,
          searchable: true,
          responsivePriority: 2,
          targets: -1,
          render: function () {
            return '';
          }
        },
        // {
        //   targets: 0,
        //   orderable: false,
        //   searchable: false,
        //   responsivePriority: 3,
        //   checkboxes: {
        //     selectRow: true
        //   },
        //   render: function () {
        //     return '<input type="checkbox" class="dt-checkboxes form-check-input">';
        //   },
        //   checkboxes: {
        //     selectAllRender: '<input type="checkbox" class="form-check-input">'
        //   }
        // },
        {
          targets: -2,
          render: function (data, type, full, meta) {
            var statusNumber = full['status'];
            var status = {
              1: { title: 'Current', class: 'bg-label-primary' },
              2: { title: 'Professional', class: 'bg-label-success' },
              3: { title: 'Rejected', class: 'bg-label-danger' },
              4: { title: 'Resigned', class: 'bg-label-warning' },
              5: { title: 'Applied', class: 'bg-label-info' }
            };
            if (typeof status[statusNumber] === 'undefined') {
              return data;
            }
            return (
              '<span class="badge ' + status[statusNumber].class + '">' + status[statusNumber].title + '</span>'
            );
          }
        }
      ],

      order: [[0, 'asc']],
      dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-6 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end mt-n6 mt-md-0"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      language: {
        paginate: {
          next: '<i class="ti ti-chevron-right ti-sm"></i>',
          previous: '<i class="ti ti-chevron-left ti-sm"></i>'
        }
      },
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-label-primary dropdown-toggle waves-effect waves-light border-none',
          text: '<i class="ti ti-file-export ti-xs me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
          buttons: [
            {
              extend: 'print',
              text: '<i class="ti ti-printer me-1"></i>Print',
              className: 'dropdown-item',
              exportOptions: {
                columns: [3, 4, 5, 6, 7],
                format: {
                  body: function (inner) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              },
              customize: function (win) {
                $(win.document.body)
                  .css('color', config.colors.headingColor)
                  .css('border-color', config.colors.borderColor)
                  .css('background-color', config.colors.bodyBg);
                $(win.document.body)
                  .find('table')
                  .addClass('compact')
                  .css('color', 'inherit')
                  .css('border-color', 'inherit')
                  .css('background-color', 'inherit');
              }
            },
            {
              extend: 'csv',
              text: '<i class="ti ti-file-text me-1"></i>Csv',
              className: 'dropdown-item',
              exportOptions: {
                columns: [3, 4, 5, 6, 7],
                format: {
                  body: function (inner) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'excel',
              text: '<i class="ti ti-file-spreadsheet me-1"></i>Excel',
              className: 'dropdown-item',
              exportOptions: {
                columns: [3, 4, 5, 6, 7],
                format: {
                  body: function (inner) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'pdf',
              text: '<i class="ti ti-file-description me-1"></i>Pdf',
              className: 'dropdown-item',
              exportOptions: {
                columns: [3, 4, 5, 6, 7],
                format: {
                  body: function (inner) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'copy',
              text: '<i class="ti ti-copy me-1"></i>Copy',
              className: 'dropdown-item',
              exportOptions: {
                columns: [3, 4, 5, 6, 7],
                format: {
                  body: function (inner) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            }
          ]

        },

      ],

      initComplete: function () {
        this.api()
          .columns(4)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-select"><option value=""> Select Role </option></select>'
            )
              .appendTo('.user_role')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });
            column
              .data()
              .unique()
              .sort()
              .each(function (d) {
                select.append('<option value="' + d + '">' + d + '</option>');
              });
          });
        this.api()
          .columns(5)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserPlan" class="form-select"><option value=""> Select Plan </option></select>'
            )
              .appendTo('.user_plan')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });
            column
              .data()
              .unique()
              .sort()
              .each(function (d) {
                select.append('<option value="' + d + '">' + d + '</option>');
              });
          });
      }
    });
  }
});

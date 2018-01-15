$(function(){
  'use strict';

  $('table').DataTable({
    processing: true,
    serverSide: true,
    "bAutoWidth": false,
    ajax: {
      url : '/dt/kk',
      type : 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    },
    columns: [
      { className: "dt-body-center", data: 'no', name: 'no' },
      { data: 'no_kk', name: 'no_kk' },
      { data: 'kepala_keluarga', name: 'kepala_keluarga' },
      { className: "dt-body-center action", data: 'action', name: 'action' },
    ]
  });

});

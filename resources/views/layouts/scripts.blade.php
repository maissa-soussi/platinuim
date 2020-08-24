<!-- jQuery -->
<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{!! asset('plugins/jquery-ui/jquery-ui.min.js') !!}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{!! asset('plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<!-- ChartJS -->
<script src="{!! asset('plugins/chart.js/Chart.min.js') !!}"></script>
<!-- Sparkline -->
<script src="{!! asset('plugins/sparklines/sparkline.js') !!}"></script>
<!-- JQVMap -->
<script src="{!! asset('plugins/jqvmap/jquery.vmap.min.js') !!}"></script>
<script src="{!! asset('plugins/jqvmap/maps/jquery.vmap.usa.js') !!}"></script>
<!-- jQuery Knob Chart -->
<script src="{!! asset('plugins/jquery-knob/jquery.knob.min.js') !!}"></script>
<!-- daterangepicker -->
<script src="{!! asset('plugins/moment/moment.min.js') !!}"></script>
<script src="{!! asset('plugins/daterangepicker/daterangepicker.js') !!}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{!! asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') !!}"></script>
<!-- Summernote -->
<script src="{!! asset('plugins/summernote/summernote-bs4.min.js') !!}"></script>
<!-- overlayScrollbars -->
<script src="{!! asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('dist/js/adminlte.js') !!}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{!! asset('dist/js/pages/dashboard.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('dist/js/demo.js') !!}"></script>


<script src="{!! asset('assets/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('assets/js/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('assets/js/sweetalert.js') !!}"></script>
<script src="{!! asset('assets/js/custom-script.js') !!}"></script>



<script>
         $(function() {
           if($('#categories').length > 0){
            $('#categories').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('listecategories') }}",
               columns: [
                        { data: 'categorie', name: 'categorie' },
                        { data: 'action_btns', name: 'action_btns' },
                     ]
            });

           }

           if($('#vehicules').length > 0){
            $('#vehicules').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('listevehicules') }}",
               columns: [
                        { data: 'photo', name: 'photo' },
                        { data: 'categorie', name: 'categorie' },
                        { data: 'vehicule', name: 'vehicule' },
                        { data: 'matricule', name: 'matricule' },
                        { data: 'status', name: 'status' },
                        { data: 'action_btns', name: 'action_btns' },
                     ]
            });

           }


           if($('#clients').length > 0){
            $('#clients').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('listeclients') }}",
               columns: [
                        { data: 'nom', name: 'nom' },
                        { data: 'cin', name: 'cin' },
                        { data: 'email', name: 'email' },
                        { data: 'status', name: 'status' },
                        { data: 'action_btns', name: 'action_btns' },
                     ]
            });

           }
               
         });
         </script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js'></script>
<script>
   var vue = new Vue({
  el: '#app',
  data: {
    formOpen: false,
    productData: {
      is_featured: false
    }
  },
  methods: {
    resetForm: function () {
      this.productData = {
        is_featured: false
      }
    },
    cancel: function() {
      this.formOpen = false;
      this.resetForm();
    }
  }
})
</script>
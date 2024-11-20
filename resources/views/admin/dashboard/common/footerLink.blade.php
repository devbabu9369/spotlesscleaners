<!-- <script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script> -->
		<!-- Bootstrap 4 -->
		<script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
 
		<!-- AdminLTE for demo purposes -->
		<script src="{{ asset('admin-assets/js/demo.js')}}"></script>
 
		<!-- Bootstrap 4 -->
		<script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('admin-assets/js/adminlte.min.js')}}"></script>
		<!-- AdminLTE for demo purposes -->
        <!-- Summernote -->
        <script src="{{ asset('admin-assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
 
		<script src="{{ asset('admin-assets/js/demo.js')}}"></script>
		<script src="{{ asset('admin-assets/js/common.js')}}"></script>
		<script src="{{ asset('admin-assets/js/commonAjax.js')}}"></script>
		
  <!--      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>-->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">-->
  <!--<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

         
        <script>

                $(document).ready(function() {
        $('#multiple-checkboxes').multiselect({
          includeSelectAllOption: true,
        });
    });
            $(function () {
                // Summernote
                $('.summernote').summernote({
                    height: '300px'
                });
               
                // const dropzone = $("#image").dropzone({ 
                //     url:  "create-product.html",
                //     maxFiles: 5,
                //     addRemoveLinks: true,
                //     acceptedFiles: "image/jpeg,image/png,image/gif",
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                //     }, success: function(file, response){
                //         $("#image_id").val(response.id);
                //     }
                // });

            });
            
            
            
 
        </script>

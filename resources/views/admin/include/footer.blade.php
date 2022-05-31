
                </div> <!-- content -->

                <footer class="footer">
                     © 2022 CompanyName.com Admin Panel | Developed By <a href="https://softnue.com/" target="_blank">Softnue</a>
                </footer>
                
                </div>
                <!-- End Right content here -->
                
                </div>
                <!-- END wrapper -->
                
                
                <!-- jQuery  -->
                <script src="{{asset('assets/js/jquery.min.js')}}"></script>
                <script src="{{ asset('assets/js/tether.min.js')}}"></script><!-- Tether for Bootstrap -->
                <script src="{{ asset('assets/js/popper.min.js')}}"></script>
                <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
                <script src="{{ asset('assets/js/modernizr.min.js')}}"></script>
                <script src="{{ asset('assets/js/detect.js')}}"></script>
                <script src="{{ asset('assets/js/fastclick.js')}}"></script>
                <script src="{{ asset('assets/js/jquery.slimscroll.js')}}"></script>
                <script src="{{ asset('assets/js/jquery.blockUI.js')}}"></script>
                <script src="{{ asset('assets/js/waves.js')}}"></script>
                <script src="{{ asset('assets/js/jquery.nicescroll.js')}}"></script>
                <script src="{{ asset('assets/js/jquery.scrollTo.min.js')}}"></script>
                
                <!--Morris Chart-->
                
                <script src="{{ asset('assets/plugins/raphael/raphael-min.js')}}"></script>
                
                <script src="{{ asset('assets/pages/dashborad.js')}}"></script>
                
                <!-- Required datatable js -->
                <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
                <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
                <!-- Buttons examples -->
                <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
                <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
                <script src="{{ asset('assets/plugins/datatables/jszip.min.js')}}"></script>
                <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
                <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
                <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
                <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
                <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
                <!-- Responsive examples -->
                <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
                <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
                
                <!-- Datatable init js -->
                <script src="{{ asset('assets/pages/datatables.init.js')}}"></script>
                
                <!-- Dropfile js -->
                <script src="{{ asset('assets/plugins/dropzone/dist/dropzone.js')}}"></script>
                <!--Summernote js-->
                <script src="{{ asset('assets/plugins/summernote/summernote.min.js')}}"></script>
                <script>
                    jQuery(document).ready(function(){
                        $('.summernote').summernote({
                            height: 300,                 // set editor height
                            minHeight: null,             // set minimum height of editor
                            maxHeight: null,             // set maximum height of editor
                            focus: true                 // set focus to editable area after initializing summernote
                        });
                    });
                </script>
                
                
                <!-- App js -->
                <script src="{{ asset('assets/js/app.js')}}"></script>
                @yield('script')
                </body>
                
                </html>
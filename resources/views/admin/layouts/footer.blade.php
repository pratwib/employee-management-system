            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Emmasys 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h6 class="text" style="text-align: center;">
                                Are you sure you want to logout?</h6>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}">
            </script>

            <!-- Core plugin JavaScript-->
            <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}">
            </script>

            <!-- Custom scripts for all pages-->
            <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

            <!-- Table plugins -->
            <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}">
            </script>
            <script
                src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}">
            </script>

            <!-- Table custom scripts -->
            <script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>
            </body>

            </html>

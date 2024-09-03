
        <div class="page-content m-5">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Dashboard</h2>
                </div>
            </div>
            <section class="no-padding-top no-padding-bottom">
                <div class="container-fluid m-2">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="statistic-block block">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="icon-user-1"></i></div><strong>Total
                                            Clients</strong>
                                    </div>
                                    <div class="number dashtext-1">{{ $userCount }}</div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                                        aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="statistic-block block">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="icon-contract"></i></div><strong>Total 
                                            Products</strong>
                                    </div>
                                    <div class="number dashtext-2">{{$product}}</div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                                        aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="statistic-block block">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Total
                                            Order</strong>
                                    </div>
                                    <div class="number dashtext-3">{{$order}}</div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0"
                                        aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
           </span>
                                
                                </div>

            <footer class="footer">
                <div class="footer__block block no-margin-bottom">
                    <div class="container-fluid text-center">
                        <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                    
                    </div>
                </div>
            </footer>
        </div>
    </div>
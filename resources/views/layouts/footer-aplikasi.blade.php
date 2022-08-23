<div class="footer-top">
    <div class="container-fluid">
        <div class="col-xs-8 agile-leftmk">
            <h2>Lakukan Delivery Order Disini</h2>
            <p>Free Delivery untuk 1kM!</p>
            <div class="contact-w3l">
                <div class="container">
                    <!-- tittle heading -->
                    <h3 class="tittle-w3l" style="color: white" id="contact">Contact Us
                        <span class="heading-style">
                            <i></i>
                            <i></i>
                            <i></i>
                        </span>
                    </h3>
                    <!-- //tittle heading -->
                    <!-- contact -->
                    <div class="contact agileits">
                        <div class="contact-agileinfo">
                            <div class="contact-form wthree">
                                <form method="post" id="from">
                                    <div class="">
                                        <input type="text" name="nama" id="nama" placeholder="Name" value="@if(Auth::check()){{ Auth::user()->name }} @endif" required="">
                                    </div>
                                    <div class="">
                                        <input class="email" id="email" type="email" name="email" placeholder="Email" value="@if(Auth::check()){{ Auth::user()->email }} @endif" required="">
                                    </div>
                                    <div class="">
                                        <input class="text" id="subject" type="text" name="subject" placeholder="Subject" required="">
                                    </div>
                                    <div class="">
                                        <textarea placeholder="Message" id="pesan" name="pesan" required=""></textarea>
                                    </div>
                                    <input type="submit" id="" class="button" value="Submit">
                                </form>
                                {{-- <div class="alert alert-success" id="alert1" role="alert">
                                    <strong>Well done!</strong> You successfully read this important alert message.
                                </div> --}}
                                {{-- <button id="button3">Title, Text and Icon</button> --}}
                                <script>
		                        //   var btn = document.querySelector("#button3").addEventListener('click', function(){
                                        
                                //         });

                                    $('#from').submit(function(e){
                                        e.preventDefault();
                                        var nama = $('#nama').val();
                                        var email = $('#email').val();
                                        var subject = $('#subject').val();
                                        var pesan = $('#pesan').val();
                                
                                        var data={
                                            'nama': nama,
                                            'email': email,
                                            'subject': subject,
                                            'pesan': pesan,
                                        }

                                        $.post(
                                            '{{ url("/pesan") }}',
                                            JSON.stringify(data),
                                            function(res){
                                                swal("Pesan ", "Berhasil Terkirim!", "success");
                                                $('#from').trigger('reset');
                                            },
                                            "JSON",
                                        )
                                    });
                                </script>
                            </div>
                            <div class="contact-right wthree">
                                <div class="col-xs-4 contact-text w3-agileits">
                                    <p><i class="fa fa-map-marker"></i> 693X+HV7, Jl. Arimbi, Jomblangan, Banguntapan, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55198.</p>
                                    <p><i class="fa fa-phone"></i> Telephone : 088802688097</p>
                                    <p>
                                        <i class="fa fa-envelope-o"></i> Email :
                                        <a href="mailto:sin990325@mail.com">sin990325@gmail.com</a>
                                    </p>
                                </div>
                                <div class="col-xs-8 contact-text w3-agileits">
                                    {{-- <h2><i class="fa fa-map-marker"></i>Lokasi</h2> --}}
                                    <div class="map w3layouts" style="width: 100%">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.940961593865!2d110.3974918174438!3d-7.796075799999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57a778f05995%3A0xc0f5cf6963ca0d18!2sAyam%20Geprek%20Pak%20Tarno!5e0!3m2!1sid!2sid!4v1660747294506!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                                {{-- <div class="col-xs-4 contact-text w3-agileits">
                                    <p><i class="fa fa-fax"></i> FAX : +1 888 888 4444</p>     
                                </div> --}}
                                {{-- <div class="col-xs-4 contact-text w3-agileits">
                                    
                                </div> --}}
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                    <!-- //contact -->
                </div>
            </div>
            <div class="newsform-w3l">
                <span class="fa fa-envelope-o" aria-hidden="true"></span>
            </div>
        </div>
        <div class="col-xs-4 w3l-rightmk">
            <img src="{{ asset('grocery') }}/images/tab3.png" alt=" ">
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="copy-right">
    <div class="container">
        <p>© 2017 Grocery Shoppy. All rights reserved | Design by
            <a href="http://w3layouts.com"> W3layouts.</a>
        </p>
    </div>
</div>


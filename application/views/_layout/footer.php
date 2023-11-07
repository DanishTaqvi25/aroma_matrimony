<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="footer_inner">
                    <img src="<?= base_url(); ?>assets/images/simons.png">
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer_inner">
                    <h4 font-weight:bold;">Help</h4>
                    <ul>
                        <li><a href="<?= base_url(); ?>profile/myorders">Track Your Order</a></li>
                        <li><a href="https://tawk.to/chat/57fb19364aab0c28dbecedab/default" target="_blank">Chat with Us</a></li>
                        <li><a href="<?= base_url(); ?>contactus">Support</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-2">
                <div class="footer_inner middle">
                    <h4 font-weight:bold;">ABOUT US</h4>
                    <ul>
                        <li><a href="<?= base_url(); ?>aboutus">Our History</a></li>
                        <li><a href="<?= base_url(); ?>pages/privacy">Privacy Policy</a></li>
                        <li><a href="<?= base_url(); ?>pages/cancellation">Cancellation Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-2">
                <div class="footer_inner middle">
                    <h4 style="font-weight:bold;">PRODUCTS</h4>
                    <ul>
                        <li><a href="<?= base_url(); ?>products">Our Products</a></li>
                        <li><a href="<?= base_url(); ?>offers">Offers</a></li>
                        <li><a href="<?= base_url(); ?>aboutus">About Us</a></li>
                        <li><a href="<?= base_url(); ?>contactus">Contact Us</a></li>
                        
                    </ul>
                </div>
            </div>

            <div class="col-md-2">
                <div class="footer_inner middle">
                    <h4 font-weight:bold;">CONTACT US</h4>
                     <p><a style="color:#bd9408;" href="tel:+9199460377770">99460377770</a></p>
                    <p>support@lazza.co.in</p>
                    <span><a href="https://facebook.com/lazzaicecream.in"><img src="<?php echo base_url(); ?>assets/images/fb.png"></a>
                        <a href="https://instagram.com/lazza.icecream_official"><img src="<?php echo base_url(); ?>assets/images/insta.png"></a>
                        <a href="https://www.youtube.com/channel/UCLSZ1W_zTbP1t-KtgJQQi9w"><img src="<?php echo base_url(); ?>assets/images/pin.png"></a>
                </div>
            </div>

            <div class="col-md-2">
                <div class="footer_inner middle">
                    <img src="<?php echo base_url(); ?>assets/images/footer_logo.png">
                </div>
            </div>
        </div>
    </div>
    
</footer>
<script>
    $(document).ready(function() {
        $("#cntcart").html(getCookie('Cart_Items_count'));
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('#header').addClass('darkHeader');
            } else {
                $('#header').removeClass('darkHeader');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#search").click(function() {
            $(".search_bar").toggle();
        });

        $("#searchall").keydown(function(e) {
            if (e.keyCode == 13) {
                window.location = "<?php echo base_url() ?>products/search/" + $(this).val();
            }
        })
    });
</script>
<script>
    $(document).on("click", ".proced_addtocart", function() {
        var closest = $(this).parent().closest('div[id]');
        var stockvalue = $(closest).find('#stockvalue').val();
        var add_cart_item = $(closest).find('.add_cart_item').val();
        var quantity = $(closest).find('#add_cart_qty').val();
        if (quantity === "0") {
            quantity = 1;
        }
        $("#outofstock").html('');
        if (parseInt(stockvalue) < parseInt(quantity)) {
            $("#outofstock").html('Out of stock');
            return;

        }
        var productName = '';
        var productImage = '';
        var regularPrice = '';
        var discountedPrice = '';
        var rate = 0;
        $.ajax({
            url: '<?php echo base_url(); ?>products/getProductById/' + add_cart_item,
            async: false,
            success: function(Onj) {
                var str = '';
                $.each(Onj.product, function(index, row) {
                    add_cart_item = row.productId;
                    productName = row.productName;
                    productImage = row.productImage;
                    regularPrice = row.regularPrice;
                    discountedPrice = row.discountedPrice;
                    rate = discountedPrice;
                });
            },
            error: function(data) {
                console.log('Error')
            }
        });
        if (discountedPrice === '' || discountedPrice === null) {
            discountedPrice = 0;
        }
        if (parseFloat(discountedPrice) < 1) {
            rate = regularPrice;
        }
        var Cart_Items = getCookie('Cart_Items');
        var item = '';
        item = item + '{"productId":"' + add_cart_item + '","productName":"' + productName + '","productImage":"' + productImage + '","productrate":"' + rate + '","productquantity":"' + quantity + '"   ';
        item = item + '}';
        if (Cart_Items === '' || Cart_Items === null || Cart_Items === 'null') {
            setCookie('Cart_Items', item);
            setCookie('Cart_Items_count', 1);
            toastr["success"]('Item Added to Cart  Successfully');
        } else {
            console.log(Cart_Items);
            var im = '[' + Cart_Items + ']';
            im = JSON.parse(im);
            var is_exist = 0;
            var cart_item = '';
            var i = 1;
            $.grep(im, function(n) {

                var productId = n.productId;
                var productName = n.productName;
                var productImage = n.productImage;
                var productrate = n.productrate;
                var productquantity = n.productquantity;
                if (add_cart_item !== n.productId) {
                    if (cart_item !== '') {
                        cart_item = cart_item + ',';
                    }
                    cart_item = cart_item + '{"productId":"' + n.productId + '","productName":"' + n.productName + '","productImage":"' + n.productImage + '","productrate":"' + n.productrate + '","productquantity":"' + n.productquantity + '"   ';
                    cart_item = cart_item + '}';
                    i++;
                } else {
                    if (cart_item !== '') {
                        cart_item = cart_item + ',';
                    }
                    cart_item = cart_item + '{"productId":"' + n.productId + '","productName":"' + n.productName + '","productImage":"' + n.productImage + '","productrate":"' + n.productrate + '","productquantity":"' + n.productquantity + '"   ';
                    cart_item = cart_item + '}';
                    is_exist = 1;
                }
            });
            setCookie('Cart_Items_count', i);
            if (is_exist < 1) {
                if (cart_item !== '' && cart_item.length != 0) {
                    cart_item = cart_item + ',';
                }
                cart_item = cart_item + item;
                toastr["success"]('Item Added to Cart  Successfully');
            } else {
                toastr["error"]('Item Already Exist In the Cart');
            }
            setCookie('Cart_Items', cart_item);
        }
        $("#cntcart").html(getCookie('Cart_Items_count'));
        $(closest).find('#add_cart_qty').val(1);
        $("#modaladdCart").modal("hide");


    });
    $(document).ready(function() {

        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('#header').addClass('darkHeader');
            } else {
                $('#header').removeClass('darkHeader');
            }
        });
    });
</script>
<script>
    function deleteaddress(id) {
        var url = '<?php echo base_url(); ?>home/deleteaddrees/' + id;
        $.ajax({
            url: url,
            success: function(Onj) {
                alert('Updated successfully');
                window.location.reload();
            },
            error: function(data) {}
        });
    }

    function logout() {
        $.ajax({
            url: "<?php echo base_url(); ?>Login/logout",
            async: false,
            success: function(Onj) {
                var result = JSON.parse(Onj);
                window.location = '<?php echo base_url(); ?>';
            },
            error: function(data) {

            }
        });
    }

    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('#header').addClass('darkHeader');
            } else {
                $('#header').removeClass('darkHeader');
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "100",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
</body>

</html>
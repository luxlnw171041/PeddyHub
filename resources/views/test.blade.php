@extends('layouts.peddyhub')

@section('content')
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    .btn-peddyhub {
        background: #B8205B;
        color: white;
        font-family: 'Sarabun', sans-serif;
        width: 100%;
    }

    .btn-nosubmit {
        background: none;
        color: #B8205B;
        font-family: 'Sarabun', sans-serif;
        width: 100%;
        text-decoration: underline;
        font-weight: bold;
    }
    .btn-peddyhub:hover {
    color: white;
    background: #BE3A6D;
}
.btn-nosubmit:hover {
    background: none;
        color: #B8205B;
}
</style>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="btn-submit" data-toggle="modal" data-target="#exampleModalCenter">
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{ asset('/peddyhub/images/PEDDyHUB sticker line/11.png') }}" alt="" width="35%">
                <h5 style="font-family: 'Sarabun', sans-serif;"> <b>ยินยอมใช้ระบบหาคู่สัตว์เลี้ยง</b> </h5>
                <p style="font-family: 'Sarabun', sans-serif;">ท่านมีความยินยอมที่จะให้เว็บไซต์ PEDDyHUB นำสัตว์เลี้ยงของท่านไปใช้ในระบบหาคู่สัตว์เลี้ยง</p>
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-peddyhub" data-dismiss="modal" onclick="petdating()">ยินยอม</button>
                    </div>
                    <div class="col-6">
                        <a href="{{ url('/')}}" style="font-family: 'Sarabun', sans-serif;" type="button" class="btn btn-nosubmit"> <u> ไม่ยินยอม</u></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div style="padding: 0 26px">
    <h2>Color scheme switch using cookies (JavaScript)</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu pellentesque orci. Curabitur vel luctus dolor. Duis eu nisl sed mi pharetra iaculis. Maecenas nec lorem ac felis congue lobortis. Suspendisse imperdiet non ligula in hendrerit. Fusce bibendum mollis leo ut laoreet. Proin iaculis dolor commodo mi interdum auctor. Nam vehicula posuere elementum. Mauris ex lacus, sollicitudin et varius quis, dignissim ut velit.</p>
    <p>In dolor ante, accumsan vitae iaculis a, sollicitudin id lorem. Vestibulum tincidunt, sem eget condimentum pretium, lacus leo rutrum justo, non vestibulum ex justo ac erat. Sed non lacinia lorem. Praesent placerat nisl in orci efficitur venenatis. Donec vel odio vestibulum, fermentum sem vitae, ullamcorper turpis. Vivamus a purus sem. Suspendisse imperdiet lacinia elit, eget semper metus. Curabitur eleifend posuere ipsum eu iaculis. Suspendisse risus tortor, sollicitudin sed sem a, efficitur vulputate leo. Nam rutrum maximus neque, a sagittis libero gravida quis. Fusce sodales lacus ut mauris bibendum, nec blandit diam pulvinar. Aenean interdum nisl urna, eu viverra eros congue vulputate.</p>
    <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi aliquam nulla ut mauris congue, sed vulputate sem volutpat. Donec consectetur quam sit amet interdum pulvinar. Aenean pulvinar egestas massa, non finibus ligula finibus eu. Ut et ante at diam tempus tempus luctus eleifend sapien. Duis vel nibh bibendum, scelerisque odio mattis, lacinia dui. Etiam vel risus cursus, dignissim dui sed, iaculis magna. Integer in nibh tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut quis augue ut nulla pellentesque ultrices. Curabitur scelerisque dui non ante maximus, ut ornare erat suscipit.</p>
    <p>Pellentesque nec enim nec orci volutpat tincidunt egestas et erat. Ut interdum massa sit amet accumsan imperdiet. Quisque neque ante, blandit eget tellus non, molestie porta ipsum. Fusce scelerisque eleifend tellus vitae vehicula. Nam ac mollis ante, nec porta felis. Nunc efficitur, purus ac molestie aliquet, ligula metus tempor lectus, at efficitur eros ligula id nulla. Proin diam odio, vestibulum sit amet varius nec, fermentum eget mi. Sed efficitur, lacus non volutpat elementum, erat eros egestas erat, at suscipit turpis massa id nisl. Fusce rhoncus sapien ac blandit maximus.</p>
    <p>Proin eu commodo eros, pellentesque vulputate magna. Nulla vel leo sem. Nulla maximus, felis nec auctor condimentum, lectus arcu facilisis dui, nec ultricies justo dui eget arcu. Quisque vel facilisis libero. Donec venenatis metus id dui blandit, ut sagittis eros rutrum. Aliquam erat volutpat. Suspendisse ut augue quis erat blandit pellentesque in vel sem. Maecenas eu semper sem, sed laoreet metus. Quisque lacus magna, congue eget ante ac, molestie elementum urna. Integer rhoncus varius lectus vitae pulvinar. Donec non volutpat odio. In sed tempor erat.</p>
    <p>
    </p>
</div>
<script>
     document.addEventListener('DOMContentLoaded', (event) => {
        checkCookie();
    });
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        let accept = getCookie("ยินยอมใช้ระบบหาคู่สัตว์เลี้ยง");
        if (accept != "ยินยอม") {
            document.querySelector('#btn-submit').click();
        }
    }
</script>
<script>
    function petdating() {
        setCookie("ยินยอมใช้ระบบหาคู่สัตว์เลี้ยง", "ยินยอม");
    }
</script>

@endsection
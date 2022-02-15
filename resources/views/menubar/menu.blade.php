<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@500&display=swap" rel="stylesheet">
        <style>
        .scrolling-wrapper {
        overflow-x: scroll;
        overflow-y: hidden;
        white-space: nowrap;
        }
        .menupet {
            display: inline-block;
        }
        .scrolling-wrapper {
        -webkit-overflow-scrolling: touch;
        }
        .btn-outline-peddyhub {
            position: relative;
            line-height: 29px;
            color: #8e8e8e;
            font-size: 16px;
            font-weight: 700;
            border: none;
            background: none;
            font-size:18px;
        }

        .btn-outline-peddyhub:hover {
            background: #B81F5B;
            color: #ffffff;
        }
        .text-b {
            font-family: 'Mitr', sans-serif;
            font-size:18px;
        }
        .icon-menu{
            font-size:40px;
        }
        </style>
        <div class="d-none d-lg-block container text-center">
            <div class="card" style="border:none;">
                <div class="card-body d-flex justify-content-around"style="padding:10px;">
                    <a href="{{ url()->current(); }}?category=1" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"><i class="fas fa-dog icon-menu"  ></i>  <br>สุนัข</b></a>
                    <a href="{{ url()->current(); }}?category=2" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"> <i class="fas fa-cat icon-menu" ></i> <br> แมว</b></a>
                    <a href="{{ url()->current(); }}?category=3" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"> <i class="fas fa-dove icon-menu" ></i> <br>นก</b></a>
                    <a href="{{ url()->current(); }}?category=4" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"> <i class="fas fa-fish icon-menu" ></i> <br>ปลา</b></a>
                    <a href="{{ url()->current(); }}?category=5" type="submit" class="btn btn-outline-peddyhub"><b class="text-b">  <i class="fas fa-frog icon-menu" ></i><br> สัตว์เล็ก</b></a>
                    <a href="{{ url()->current(); }}?category=6" type="submit" class="btn btn-outline-peddyhub"><b class="text-b">  <i class="fas fa-spider icon-menu" ></i><br> Exotic</b></a>
                </div>
            </div>
        </div>
        <div class="d-block d-md-none scrolling-wrapper container text-center ">
            <div class="menupet" >
                <div class="petbtn card-body d-flex justify-content-around"style="padding:10px;">
                    <a href="{{ url()->current(); }}?category=1"  type="submit"class="btn btn-outline-peddyhub"><b class="text-b"><i class="fas fa-dog icon-menu" ></i>  <br>สุนัข </b></a>
                    <a href="{{ url()->current(); }}?category=2" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"> <i class="fas fa-cat icon-menu"></i> <br> แมว </b></a>
                    <a href="{{ url()->current(); }}?category=3" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"> <i class="fas fa-dove icon-menu"></i> <br>นก  </b></a>
                    <a href="{{ url()->current(); }}?category=4" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"> <i class="fas fa-fish icon-menu"></i> <br>ปลา </b></a>
                    <a href="{{ url()->current(); }}?category=5" type="submit" class="btn btn-outline-peddyhub"><b class="text-b">  <i class="fas fa-frog icon-menu"></i><br> สัตว์เล็ก</b></a>
                    <a href="{{ url()->current(); }}?category=6" type="submit" class="btn btn-outline-peddyhub"><b class="text-b">  <i class="fas fa-spider icon-menu"></i><br> Exotic</b></a>
                </div>
            </div>
        </div>
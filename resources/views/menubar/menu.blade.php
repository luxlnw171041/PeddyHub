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
            color: #cd628c;
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
        .btn-peddyhub {
            position: relative;
            line-height: 29px;
            color: #ffffff;
            font-size: 16px;
            font-weight: 700;
            border: none;
            background: #B81F5B;
            font-size:18px;
        }
        .btn-peddyhub:hover {
            background: #B81F5B;
            color: #ffffff;
        }
        </style>
        <div class="d-none d-lg-block container text-center">
            <div class="card" style="border:none;">
                <div class="card-body d-flex justify-content-around"style="padding:10px;">
                    <a id="btn_cat_pc_0" href="{{ url()->current(); }}" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"><i class="fa-solid fa-paw icon-menu"></i>  <br>ทั้งหมด</b></a>
                    <a id="btn_cat_pc_1" href="{{ url()->current(); }}?pet_category_id=1" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"><i class="fas fa-dog icon-menu"  ></i>  <br>สุนัข</b></a>
                    <a id="btn_cat_pc_2" href="{{ url()->current(); }}?pet_category_id=2" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"> <i class="fas fa-cat icon-menu" ></i> <br> แมว</b></a>
                    <a id="btn_cat_pc_3" href="{{ url()->current(); }}?pet_category_id=3" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"> <i class="fas fa-dove icon-menu" ></i> <br>นก</b></a>
                    <a id="btn_cat_pc_4" href="{{ url()->current(); }}?pet_category_id=4" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"> <i class="fas fa-fish icon-menu" ></i> <br>ปลา</b></a>
                    <a id="btn_cat_pc_5" href="{{ url()->current(); }}?pet_category_id=5" type="submit" class="btn btn-outline-peddyhub"><b class="text-b">  <i class="fas fa-frog icon-menu" ></i><br> สัตว์เล็ก</b></a>
                    <a id="btn_cat_pc_6" href="{{ url()->current(); }}?pet_category_id=6" type="submit" class="btn btn-outline-peddyhub"><b class="text-b">  <i class="fas fa-spider icon-menu" ></i><br> Exotic</b></a>
                </div>
            </div>
        </div>
        <div class="d-block d-md-none scrolling-wrapper container text-center ">
            <div class="menupet" >
                <div class="petbtn card-body d-flex justify-content-around"style="padding:10px;">
                    <a id="btn_cat_0" href="{{ url()->current(); }}" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"><i class="fa-solid fa-paw icon-menu"></i>  <br>ทั้งหมด</b></a>
                    <a id="btn_cat_1" href="{{ url()->current(); }}?pet_category_id=1"  type="submit"class="btn btn-outline-peddyhub"><b class="text-b"><i class="fas fa-dog icon-menu" ></i>  <br>สุนัข </b></a>
                    <a id="btn_cat_2" href="{{ url()->current(); }}?pet_category_id=2" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"> <i class="fas fa-cat icon-menu"></i> <br> แมว </b></a>
                    <a id="btn_cat_3" href="{{ url()->current(); }}?pet_category_id=3" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"> <i class="fas fa-dove icon-menu"></i> <br>นก  </b></a>
                    <a id="btn_cat_4" href="{{ url()->current(); }}?pet_category_id=4" type="submit" class="btn btn-outline-peddyhub"><b class="text-b"> <i class="fas fa-fish icon-menu"></i> <br>ปลา </b></a>
                    <a id="btn_cat_5" href="{{ url()->current(); }}?pet_category_id=5" type="submit" class="btn btn-outline-peddyhub"><b class="text-b">  <i class="fas fa-frog icon-menu"></i><br> สัตว์เล็ก</b></a>
                    <a id="btn_cat_6" href="{{ url()->current(); }}?pet_category_id=6" type="submit" class="btn btn-outline-peddyhub"><b class="text-b">  <i class="fas fa-spider icon-menu"></i><br> Exotic</b></a>
                </div>
            </div>
        </div>

<script>
    if (document.location.search === "") {
        document.querySelector('#btn_cat_pc_0').classList.add('btn-peddyhub');
        document.querySelector('#btn_cat_pc_0').classList.remove('btn-outline-peddyhub');
        document.querySelector('#btn_cat_0').classList.add('btn-peddyhub');
        document.querySelector('#btn_cat_0').classList.remove('btn-outline-peddyhub');
    }
    else if (document.location.search === "?pet_category_id=1") {
        document.querySelector('#btn_cat_pc_1').classList.add('btn-peddyhub');
        document.querySelector('#btn_cat_pc_1').classList.remove('btn-outline-peddyhub');
        document.querySelector('#btn_cat_1').classList.add('btn-peddyhub');
        document.querySelector('#btn_cat_1').classList.remove('btn-outline-peddyhub');
    }
    else if (document.location.search === "?pet_category_id=2") {
        document.querySelector('#btn_cat_pc_2').classList.add('btn-peddyhub');
        document.querySelector('#btn_cat_pc_2').classList.remove('btn-outline-peddyhub');
        document.querySelector('#btn_cat_2').classList.add('btn-peddyhub');
        document.querySelector('#btn_cat_2').classList.remove('btn-outline-peddyhub');
    }
    else if (document.location.search === "?pet_category_id=3") {
        document.querySelector('#btn_cat_pc_3').classList.add('btn-peddyhub');
        document.querySelector('#btn_cat_pc_3').classList.remove('btn-outline-peddyhub');
        document.querySelector('#btn_cat_3').classList.add('btn-peddyhub');
        document.querySelector('#btn_cat_3').classList.remove('btn-outline-peddyhub');
    }
    else if (document.location.search === "?pet_category_id=4") {
        document.querySelector('#btn_cat_pc_4').classList.add('btn-peddyhub');
        document.querySelector('#btn_cat_pc_4').classList.remove('btn-outline-peddyhub');
        document.querySelector('#btn_cat_4').classList.add('btn-peddyhub');
        document.querySelector('#btn_cat_4').classList.remove('btn-outline-peddyhub');
    }
    else if (document.location.search === "?pet_category_id=5") {
        document.querySelector('#btn_cat_pc_5').classList.add('btn-peddyhub');
        document.querySelector('#btn_cat_pc_5').classList.remove('btn-outline-peddyhub');
        document.querySelector('#btn_cat_5').classList.add('btn-peddyhub');
        document.querySelector('#btn_cat_5').classList.remove('btn-outline-peddyhub');
    }
    else if (document.location.search === "?pet_category_id=6") {
        document.querySelector('#btn_cat_pc_6').classList.add('btn-peddyhub');
        document.querySelector('#btn_cat_pc_6').classList.remove('btn-outline-peddyhub');
        document.querySelector('#btn_cat_6').classList.add('btn-peddyhub');
        document.querySelector('#btn_cat_6').classList.remove('btn-outline-peddyhub');
    }
</script>
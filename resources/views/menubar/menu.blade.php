        <style>
            .scrolling-wrapper {
        overflow-x: scroll;
        overflow-y: hidden;
        white-space: nowrap;
                    }
        .asd {
            display: inline-block;
        }
        .scrolling-wrapper {
        -webkit-overflow-scrolling: touch;
        }
        </style>
        <div class="col-12">
            <div class=" scrolling-wrapper container text-center md:px-20 xl:px-20 flex sm:justify-between justify-center items-center sm:overflow-x-scroll">
                <div class="asd" >
                    <div class="card-body d-flex justify-content-around"style="padding:10px;">
                        <a href="{{ url()->current(); }}?category=1"  type="submit" class="btn likebtn btn-lg" style="font-family: 'Mitr', sans-serif;font-size:18px;padding:15px 30px;"><b><i class="fas fa-dog"  style="font-size:40px;"></i>  <br>สุนัข </b></a>
                        <a href="{{ url()->current(); }}?category=2" type="submit" class="btn likebtn btn-lg" style="font-family: 'Mitr', sans-serif;font-size:18px; padding:15px 30px;"><b> <i class="fas fa-cat" style="font-size:40px;"></i> <br> แมว </b></a>
                        <a href="{{ url()->current(); }}?category=3" type="submit" class="btn likebtn btn-lg" style="font-family: 'Mitr', sans-serif;font-size:18px; padding:15px 30px;"><b> <i class="fas fa-dove" style="font-size:40px;"></i> <br>นก  </b></a>
                        <a href="{{ url()->current(); }}?category=4" type="submit" class="btn likebtn btn-lg" style="font-family: 'Mitr', sans-serif;font-size:18px; padding:15px 30px;"><b> <i class="fas fa-fish" style="font-size:40px;"></i> <br>ปลา </b></a>
                        <a href="{{ url()->current(); }}?category=5" type="submit" class="btn likebtn btn-lg" style="font-family: 'Mitr', sans-serif;font-size:18px; padding:15px 30px;"><b>  <i class="fas fa-frog" style="font-size:40px;"></i><br> สัตว์เล็ก</b></a>
                        <a href="{{ url()->current(); }}?category=6" type="submit" class="btn likebtn btn-lg" style="font-family: 'Mitr', sans-serif;font-size:18px; padding:15px 30px;"><b>  <i class="fas fa-spider" style="font-size:40px;"></i><br> Exotic</b></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8 col-md-9 " style="margin-top:15px;">
            <a href="#" class="theme-btn btn-style-two thm-btn">ทั่วไป</a>
            <a href="#" class="theme-btn btn-style-five thm-btn">ตามหาน้องๆ</a>
            <a href="#" class="theme-btn btn-style-ten thm-btn">ตามหาเจ้าของ</a>
        </div>
        
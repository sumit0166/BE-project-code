<!-- https://localhost/test/insert_data.php?flag=0&rtemp=24&humid=18&moist=35&light=58  url to be used in Nodemcu-->

<!-- Password : #kb6M3obzv3ghjWs7ckJ -->
<?php

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- <meta http-equiv="refresh" content="1"/> -->
  <title>Smart Plant</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="./css/index.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
  <div id="enable_noti">  
    <div id="notiBox">
        <div><span id="closeNoti">&times;</span></div>
        <span id="notiText"> Hi Noti</span>
    </div>
  </div>
  <div class="header">
    <text>Smart Plant Management System</text>
    <div class="header-right">
      <a href="#home">Home</a>
      <a href="./history.php">History</a>
      <span></span>
      <a  id="new_gen_btn" >New Gen</a>
    </div>
  </div>
  <div class="webBody">
    <div id="container">
    <div class="photos_box">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <!-- <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div> -->
  <div class="carousel-inner" id="image-cont">
    <div class="carousel-item active" >
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnoYQnWxz88kZjxsTU_7fI7vYY2__fUToc5g&usqp=CAU" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>



  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </div>

    <div class="live_data_box">
    <h2 id="live_data_lbl">Live Data</h2>
    <div id="temperature" class="sensor-values">
      <br>
      <span class="unit_lbl">°C</span>
      <text type="text" id="temp_in" class="input_lbl" name="temp" disabled></text>
      <span class="tag_name">Temprature</span>
    </div>
    <div id="humidity" class="sensor-values">
      <br>
      <span class="unit_lbl">g/ml</span>
      <text type="text" id="hum_in" class="input_lbl" name="humid" disabled></text>
      <span class="tag_name">Humidity</span>
    </div>
    <div id="moisture" class="sensor-values">
      <br>
      <span class="unit_lbl">g/&#13221</span>
      <text type="text" id="mos_in" class="input_lbl" name="moist" disabled></text>
      <span class="tag_name">Moisture</span>
    </div>
    <div id="light" class="sensor-values">
      <br>
      <span class="unit_lbl">lux</span>
      <text type="text" id="light_in" class="input_lbl" name="light" disabled></text>
      <span class="tag_name">Light</span>
    </div>
  </div>
  

  <div class="graph_box">
      <h1 id="graph_lbl">Graphical Format</h1>
      <h1 id="graph_lbl2">Details</h1>
      <div id="tmp_graph" class=graph>
        <h2 id="graph1_heading">Room Temprature</h2>
        <img src="./icon/left-arrow.svg" id="arrow-left"></img>
        <div id="allGraph">
          <div class="chart" id="temp-chart"></div>  
          <div class="chart" id="humid-chart"></div> 
          <div class="chart" id="moist-chart"></div> 
          <div class="chart" id="light-chart"></div>
        </div>
        <img src="./icon/right-arrow.svg" id="arrow-right"></img>
      </div>
      <div  class="graph">
        <div id="details">
          <div class="lbl"  >Plant Name</div>
          <input type="text" class="inlbl" id="plnt_name" disabled>
          <div class="lbl"  >Generation</div>
          <input type="text"  class="inlbl" id="gen_name" disabled>
          <div class="lbl"  >Condition</div>
          <input type="text"  class="inlbl" id="gen_cond" disabled>
          <div class="lbl"  >Current Day</div>
          <input type="text" id="current_week" class="inlbl" disabled></input>
          <div class="lbl" id="disease" >
            <label for="disease">Disease Pridiction</label>
            <div class="dis_rows" id="dis_name">
              <span class="dis_label"> Name : </span><span class="dis_detail_in"></span>
            </div>
            <div class="dis_rows" id="proba">
              <span class="dis_label"> Probablity : </span><span class="dis_detail_in"></span>
            </div>
            <div class="dis_rows" id="symptoms">
              <span class="dis_label"> Symptoms : </span><span class="dis_detail_in"></span>
            </div>
          </div>
          <!-- <input type="" id="disease_pre" class="inlbl" disabled> -->
        </div>
      </div>
      <div id="buttons">
        <button  id="end_btn">End</button>
        <button id="photo_btn">Add Photo</button>
      </div>
    </div>
  </div>

<!-------------- Add gen frame ---------------->

  <div id="myModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h2>Start New Generation </h2>
        </div>
      <div class="modal-body">
        <span  class=show_text>Generation Name</span>
        <input id="gen_nm" type="text" class=input_data> </input>
        <span class=show_text>Plant Name </span>
        <input id="plant_name" type="text" class=input_data> </input>
        <span  class=show_text>Condition Name</span>
        <input id="cond_nm" type="text" class=input_data> </input>
        <span class=show_text>Temprature Range</span>
        <div class="in_var_data">
          <input id="min_temp" class=min_data type="number" placeholder="Min"></input>
          <input id="max_temp" class=max_data type="number" placeholder="Max"></input>
        </div>
        <span class=show_text>Humidity Range</span>
        <div class="in_var_data">
          <input id="min_humid" class=min_data type="number" placeholder="Min"> </input>
          <input id="max_humid" class=max_data type="number" placeholder="Max"> </input>
        </div>
        <span class=show_text>Moisture Range</span>
        <div class="in_var_data">
          <input id="min_moist" class=min_data type="number" placeholder="Min"> </input>
          <input id="max_moist" class=max_data type="number" placeholder="Max"> </input>
        </div>
        <hr>
        <button id="add_genration"  class="add_gen_btn" >Add Generation</button>
     </div>
    </div>
  </div>

<!-------------- Add Photo frame ---------------->

  <div id="photo_frame" >
    <div class="content">
      <div id="img_header">
        <span class="addImg_text">Add Image Off The Plant</span>
        <span class="close_btn">&times;</span>
      </div>

      <div id="imgContainer">
          <label class="left">Generation</label>
          <input class="right" id="set_gen" type="text" name="img" disabled>
          <label class="left">Day</label>
          <select class="right" id="select_week">
              <option >Select Day</option>
          </select>
          <img id="set_image" src="#" ></img>
          <label class="left">Add Image</label>
          <input class="right" type="file" id="get_image" accept="image/*">
          <label class="left"></label>
          <button class="right" id="img_submit_btn" onclick="image_add();">Add Photo</button>
      </div>    
    </div>
  </div>

<!-------------- End gen frame ---------------->

<div id="endGen_frame" >
    <div class="endGcontent">
      <div id="img_header">
        <span class="addGen_text">End Current Generation</span>
        <span id="close_btn_2">&times;</span>
      </div>

      <div id="endgenContainer">
          <label class="left">Generation</label>
          <input class="right" id="set_gen_name" type="text" name="img" disabled>
          <label class="left">Plant</label>
          <input class="right" id="set_plant_name" type="text" name="img" disabled>
          <label class="left">Quality Of the plant</label>
          <div class="rating-container">
            <div class="star-widget">
                <input type="radio" class="stars" name="rate" id="rate-5">
                <label for="rate-5" class="fas fa-star"></label>
                <input type="radio" class="stars" name="rate" id="rate-4">
                <label for="rate-4" class="fas fa-star"></label>
                <input type="radio" class="stars" name="rate" id="rate-3">
                <label for="rate-3" class="fas fa-star"></label>
                <input type="radio" class="stars" name="rate" id="rate-2">
                <label for="rate-2" class="fas fa-star"></label>
                <input type="radio" class="stars" name="rate" id="rate-1">
                <label for="rate-1" class="fas fa-star"></label>
            </div>
            <form action="#">
                <header id="header"></header>
            </form>
          </div>
          <label class="left">Growth Rate Of the plant</label>
          <input class="right" id="get_growth" type="text" name="img">
          <label class="left">Disease name (If Formed)</label>
          <input class="right" id="get_disease" type="text" name="img">
          <label class="left">Disease Detiails</label>
          <!-- <input class="right" id="get_dis_details" type="text" name="img"> -->
          <textarea class="right" id="get_dis_details"  name="details"></textarea>
          <button class="right" id="endgen_call_btn">End Generation</button>
      </div>    
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
  <script src="./js/index.js"></script>
</body>
</html>
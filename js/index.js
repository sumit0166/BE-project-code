var data;
var interval = 60000*5;
// var interval = 1000;
var room_temp = 0;
var humid = 0;
var moist = 0;
var light = 0;
var temp_chk = '';
var hum_chk = '';
var mos_chk = '';
var table = '';
var disease_prob;
var dis_json;


// --------------------------- Test Scripts --------------------
function noti(color,notiText) {
  let show_noti = document.getElementById('enable_noti');
  let close = document.getElementById('closeNoti');
  let box = document.getElementById('notiBox');
  let spanText = document.getElementById('notiText');
  box.style.backgroundColor = color;
  spanText.innerText = notiText;
  show_noti.style.animationName = 'animateDown'
  setTimeout(function () {
      show_noti.style.animationName = 'animateUp';
      
  },3000);

  close.onclick = function () {
      show_noti.style.animationName = 'animateUp'
  }
}



// --------------------------- Start Scripts --------------------

// $.get("./fetch.php?flag=0", function(data, status){
//   try {
//     data = JSON.parse(data);
//     check_data(data);
//     console.log(data);
//   } catch (error) {
//     console.log(error);
//     check_data(null);
//   } 
//   });  
setInterval(function() {
  $.get("./fetch.php?flag=0", function(data, status){
    try {
      data = JSON.parse(data);
      check_data(data);
      console.log(data);
    } catch (error) {
      console.log(error);
      check_data(null);
    } 
    });
},interval);


// --------------------  Graph Change -------------------------
var right = document.getElementById("arrow-right");
var count = 0;
let label = ['Temperature','Humidity','Moisture','Light']
document.getElementById("graph1_heading").innerHTML = label[0];
right.onclick = function(){
  if(count == 0){  
    document.getElementById('allGraph').style.left = '19.3em'
    count++;
    document.getElementById("graph1_heading").innerHTML = label[count];
  }
  else if(count == 1){
    document.getElementById('allGraph').style.left = '-19.3em'
    count++;
    document.getElementById("graph1_heading").innerHTML = label[count];
  }
  else if(count == 2){
    document.getElementById('allGraph').style.left = '-58em'
    count++;
    document.getElementById("graph1_heading").innerHTML = label[count]; 
  }
}
var left = document.getElementById("arrow-left");
left.onclick = function(){
  if(count == 3){
    document.getElementById('allGraph').style.left = '-19.3em'
    count--;
    document.getElementById("graph1_heading").innerHTML = label[count];
  }
  else if(count == 2){
    document.getElementById('allGraph').style.left = '19.3em'
    count--;
    document.getElementById("graph1_heading").innerHTML = label[count];
  }
  else if(count == 1){
    document.getElementById('allGraph').style.left = '57.7em'
    count--;
    document.getElementById("graph1_heading").innerHTML = label[count];
  }
}

  // ---------------------------- Add Gen frame-------------------

  var modal = document.getElementById("myModal");
  var btn = document.getElementById("new_gen_btn");
  var span = document.getElementsByClassName("close")[0];
  btn.onclick = function() {
    try {
      let table = document.getElementById('gen_name').innerText;
      let plant = document.getElementById('plnt_name').innerText;
      console.log()
      if (table != "" && plant != "") {
        end_gen(table,plant,0);
      }else{
        modal.style.display = "block";
      }
    } catch (error) {
      console.log(error);
    }
  }

  span.onclick = function() {
    modal.style.display = "none";
  }

  modal.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

// ---------------------------- Add Gen function -------------------

  document.getElementById("add_genration").onclick = function () {
    add_gen();
  } 
  
  function add_gen() {
    console.log("in add gen data function");
    var gen_name = document.getElementById("gen_nm").value;
    var plant_name = document.getElementById("plant_name").value;
    var cond_name = document.getElementById("cond_nm").value;
    var min_temp = document.getElementById("min_temp").value;
    var max_temp = document.getElementById("max_temp").value;
    var min_humid = document.getElementById("min_humid").value;
    var max_humid = document.getElementById("max_humid").value;
    var min_moist = document.getElementById("min_moist").value;
    var max_moist = document.getElementById("max_moist").value;
  
    if (gen_name =='' || plant_name=='' || cond_name=='' || min_temp=='' || max_temp=='' || min_humid=='' || max_humid=='' || min_moist=='' || max_moist=='' ) {
      alert("Empty Field");
      document.getElementById("gen_nm").value = '';
      document.getElementById("plant_name").value = '';
      document.getElementById("cond_nm").value = '';
      document.getElementById("min_temp").value = '';
      document.getElementById("max_temp").value = '';
      document.getElementById("min_humid").value = '';
      document.getElementById("max_humid").value = '';
      document.getElementById("min_moist").value = '';
      document.getElementById("max_moist").value = '';
    }else {
      var y = confirm("Creating New genration will stop current genration ");
      if(y == true){
        document.getElementById("add_genration").disabled = true;
    
        var chk_url = "./insert_data.php?flag=2&name="+gen_name+"&plant="+plant_name+"&cond="+cond_name+"&min_t="+min_temp+"&max_t="+max_temp+"&min_h="+min_humid+"&max_h="+max_humid+"&min_m="+min_moist+"&max_m="+max_moist;
        $.ajax({
              type: "POST",
              url: chk_url
            });
        setInterval(function(){
              window.location.reload(); 
        },1000);
      }
    }
  }


// ------ calling MAin function if currently monitering Generation ------

function check_data(data){
// console.log("sumit"+data);
if (data != null) {
  let live_check = data[0]['live_check'];
  console.log(live_check);
  if (live_check == 0) {
    document.getElementById('end_btn').style.display='none';
    document.getElementById('photo_btn').style.display='none';
    // document.getElementById('myModal').style.display= 'block';
  }
  else if(live_check == 1){
    main(data);
    // console.log("in else if check = 1 call main");
  }

}
else{
  alert("Currently Not Monitoring Any data");
  document.getElementById('end_btn').style.display="none";
  document.getElementById('photo_btn').style.display="none";
  
  }
}




// ---------------------- Main Function ------------------
function main(data){
  const table = data[0]['gen_name'];
  const plant = data[0]['plant_name'];
  const gen_condition = data[0]['plant_condition'];
  var weeks = 0;
  var crnt_week = '---';
  const third_data = data[3];
  const images = data[4];


  document.getElementById("avg_temp").innerText = data[5]["avgTemp"]+" ??C";
  document.getElementById("avg_humid").innerText = data[5]["avgHumid"]+" %";
  document.getElementById("avg_moist").innerText = data[5]["avgMoist"]+" %";
  document.getElementById("avg_light").innerText = data[5]["avgLight"]+" lux";

  
  if (third_data.length != 0){
    var dt1 = third_data[0]['date'];
    var dt2 = third_data[third_data.length-1]['date'];
    // console.log(dt1,dt2);
    if (dt1 != '' && dt2 != '') {
      // console.log('if not empty');
      var date1 = new Date(dt1);
      var date2 = new Date(dt2);
      var diffTime = date2.getTime() - date1.getTime();
      var diffDays = diffTime / (1000 * 3600 * 24);
      console.log("current days : ",diffDays)
      var weeks = diffDays/7;
      weeks = parseInt(weeks);
      var days = diffDays- (weeks*7);
      console.log(date1,date2);

      // ------------------ Weeks part -------------------------------

      // if(String(date1) != String(date2)) {
      //   if (days == 1){
      //   var crnt_week = weeks+' Weeks '+(days)+' Day';
      //   weeks = weeks + 1;
      //   }
      //   else if(days > 1){
      //     var crnt_week = weeks+' Weeks '+(days)+' Days';
      //     weeks = weeks + 1;
      //   }
      //   else{
      //     var crnt_week = '1st day';
  
      //   }
      // }else { 
      //   var crnt_week = '1st day';
      // }

      // -------------------- days part ------------------------
      
      if(String(date1) != String(date2)) {
        diffDays = diffDays + 1
        var crnt_week ='Day '+diffDays;
        weeks = weeks + 1;

      }else { 
        diffDays = 1
        var crnt_week = 'Day 1';
      }
    
    }
  
  }


  function add_image(data,i){
    const div = document.createElement("div");
    div.classList.add("carousel-item");
    if(i == 0){
      div.classList.add("active");
    }

    const img = document.createElement("img");
    img.classList.add("d-block");
    img.classList.add("w-100");
    img.src = data[i]['image'];
    img.style.width = "800px !important";
    img.style.height = "400px";


    const div2 = document.createElement("div");
    div2.classList.add("carousel-caption");
    div2.classList.add("d-none");
    div2.classList.add("d-md-block");

    const h5 = document.createElement("h5");
    h5.innerText = "Day "+data[i]['day']

    const p = document.createElement("p");
    p.innerText = data[i]['timestamp']

    div.appendChild(img);
    div.appendChild(div2);
    div2.appendChild(h5);
    div2.appendChild(p);
    document.getElementById("image-cont").appendChild(div);
  }
  if(images.length == 0){
    document.getElementById("photos_box").style.display = "none";
  } else {
    for (let i = 0; i < images.length; i++) {
      document.getElementById("photos_box").style.display = "block";
      add_image(images,i);
    }
  }


  // -------------------------- Add Image Frame -------------------
  document.getElementById('set_gen').value = table;
  var photo_div = document.getElementById("photo_frame");
  var photo_btn = document.getElementById("photo_btn");
  var close_span = document.getElementsByClassName("close_btn")[0];
  photo_btn.onclick = function() {
    photo_div.style.display = "block";
  }

  close_span.onclick = function() {
    photo_div.style.display = "none";
    document.getElementById("set_image").src = '';
    document.getElementById("get_image").value = '';
  }
  photo_div.onclick = function(event) {
  if(event.target == photo_div) {
    photo_div.style.display = "none";
    document.getElementById("set_image").src = '';
    document.getElementById("get_image").value = '';
    }
  }

  select = document.getElementById('select_week');
  for (var i = 1; i<=diffDays; i++){
      var opt = document.createElement('option');
      opt.value = i;
      opt.innerHTML = 'Day '+i;
      opt.selected = 'true';
      select.appendChild(opt);
  }

  function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#set_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
  }
  $("#get_image").change(function(){
    readURL(this);
  });


  // -------------------------- Add Image Function -------------------
  var add_btn = document.getElementById('img_submit_btn');
  add_btn.onclick = function(){
  let image = document.getElementById('set_image').src;
  let week = document.getElementById('select_week').value;
  // console.log(image);
  var chk_url = "./insert_data.php?flag=3&gen="+table+"&week="+week;
      $.ajax({
            type: "POST",
            url: chk_url,
            data : {
              src : image
            },
            success: function(response){  
              alert(response);    
              // console.log(response);
            },
            error:function(xhr, ajaxOptions, thrownError){alert(xhr.responseText); ShowMessage("??? ?? ?????? ??????? ????","fail");}
          });
  document.getElementById("set_image").src = '';
  }





  //  ------------------------- Live data -------------------
  $(document).ready(function(){

    // console.log(data[1].length);
    if (data[1] != null){
      document.getElementById("temp_in").innerText = data[1]['room_temp'];
      document.getElementById("hum_in").innerText = data[1]['humidity'];
      document.getElementById("mos_in").innerText = data[1]['moisture'];
      document.getElementById("light_in").innerText = data[1]['light'];
    }


  });



  // var label = 'Room Temprature' ;
  // var para = 'room_temp' ;


  // $(document).ready(function(){
  //     $('#select_para').change(function(){
  //       var check = $(this).val();
  //       if (check == 'temp') {
  //         label = 'Room Temprature' ;
  //         para = 'room_temp' ; 
  //       }
  //       else if(check == 'humidity'){
  //         label = 'Humidity' ;
  //         para = 'humidity'; 
  //       }
  //       else if(check == 'moisture'){
  //         label = 'Moisture' ;
  //         para = 'moisture' ; 
  //       }
  //     });
  //   });

  function live_data(type,data){

    mydata(data,'Temprature','room_temp','temp-chart');
    mydata(data,'Humidity','humidity','humid-chart');
    mydata(data,'Moisture','moisture','moist-chart');
    mydata(data,'Light','light','light-chart');


    room_temp = document.getElementById('temp_in').innerText;
    humid = document.getElementById('hum_in').innerText;
    moist = document.getElementById('mos_in').innerText;
    light = document.getElementById('light_in').innerText;
    console.log(room_temp,humid,moist,light);
    let json = data[0];
    
    temp_chk = values_check(room_temp,json.max_temp,json.min_temp);
    hum_chk =  values_check(humid,json.max_humid,json.min_humid);
    mos_chk =  values_check(moist,json.max_moist,json.min_moist);

    switch (type) {
      case 1:
        if(temp_chk == 'high'){
        change_color('temperature','high','Maximum');
        }
        else if(temp_chk == 'low'){
          change_color('temperature','low','Minimum'); 
        }
        else {
          change_color('temperature','med','Minimum'); 
        }
        if(hum_chk == 'high'){
          change_color('humidity','high','Maximum');
        }
        else if(hum_chk == 'low'){
          change_color('humidity','low','Minimum');  
        }
        else{
          change_color('humidity','med','Minimum');
        }
        if(mos_chk == 'high'){
          change_color('moisture','high','Maximum');
        }
        else if(mos_chk == 'low'){
          change_color('moisture','low','Minimum'); 
        }
        else{
          change_color('moisture','med','Minimum'); 
        } 
        break;
      case 2:
        if(Notification.permission == 'denied'){
            Notification.requestPermission();
          }
        if(temp_chk == 'high'){
          send_noti('temperature','high','Maximum');
        }
        else if(temp_chk == 'low'){
          send_noti('temperature','low','Minimum'); 
        }
        if(hum_chk == 'high'){
          send_noti('humidity','high','Maximum');
        }
        else if(hum_chk == 'low'){
          send_noti('humidity','low','Minimum');  
        }
        if(mos_chk == 'high'){
          send_noti('moisture','high','Maximum');
        }
        else if(mos_chk == 'low'){
          send_noti('moisture','low','Minimum'); 
        }
        break;
      default:
        break;
    }
  }
  room_temp = document.getElementById('temp_in').innerText;
  humid = document.getElementById('hum_in').innerText;
  moist = document.getElementById('mos_in').innerText;
  light = document.getElementById('light_in').innerText;
  try {
    // let url = "http://sumitas.pythonanywhere.com/?temp="+room_temp+"&humid="+humid+"&moist="+moist+"&light="+light
    let url = "http://127.0.0.1:5000/?temp="+room_temp+"&humid="+humid+"&moist="+moist+"&light="+light
    console.log(url);
    console.log(room_temp,humid,moist,light);
    $.get(url, function(data,){
      data = JSON.parse(data);
      set_disease(data);
    });
  } catch (error) {
    set_disease(null);
    console.log(error)
  }
  
  function set_disease(data) {
    console.log(data);
    if (data != null){
      let dis_in = document.getElementsByClassName("dis_detail_in");
      let disName = data['disease_name'] ;
      let disProb = data['disease_prob'] ;
  
      document.getElementById("dis_name").innerText = disName;
      document.getElementById("proba").innerText = disProb+" %";
  
      if(disName != "No Disease"){
        let dis_part = dis_json["disease"]
        for (var i = 0; i < dis_part.length; i++){
          if (dis_part[i].name == disName){
            console.log(dis_part[i]["symptoms"],i,dis_part[i])
            document.getElementById("symptoms").innerText = dis_part[i]["symptoms"];
            document.getElementById("fav-cond").innerText = dis_part[i]["Favourable condition"];
            document.getElementById("spread").innerText = dis_part[i]["spread"];
            document.getElementById("dis_image").src = dis_part[i]["image"];
          }
        }
      } else {
          dis_in[2].innerText = " - ";
        }
    } else{
      console.log('API Error ! Unable to reach Host !.')
    }
  }    
  $(document).ready(function(){
    live_data(1,data);
    live_data(2,data);
  });



  // -------------- graph scripts ----------------

  function mydata(data,label,para,divID){
    json = data[2];
    if(json.length == 0){
      json = [{"id":"0","room_temp":"0","humidity":"0","moisture":"0","light":"0","date":"0","time":"0","timestamp":"0"}];
    }
    const arry = [['Time',label]]
    for(var a=0;a<json.length;a++){
      var tm = json[a].timestamp;
      var rmtp =parseInt(json[a][para]);
      arry.push([tm,rmtp]);
    }

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable(arry);
      var options = {
        title: '',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById(divID));

      chart.draw(data, options);
    }
  }

  // ---------------------------- Details part -------------------
  // console.log(plant, table, gen_condition, crnt_week);
  document.getElementById('plnt_name').innerText = new String(plant);
  document.getElementById('gen_name').innerText = new String(table);
  document.getElementById('gen_cond').innerText = new String(gen_condition);
  document.getElementById('current_week').innerText = new String(crnt_week);
  // document.getElementById('current_phase').value = new String('Vegetative Growth');
  

  

  // ------------------------------- Notification -------------------



  function values_check(current,max,min){
    current = parseInt(current);
    max = parseInt(max);
    min = parseInt(min);
    if(current != 0){
        if(current > max){ 
          return('high'); 
        }
        else if(current < min){
        return('low');
      }
        else { 
          return('med'); 
        }
    }else{ return('med'); }

  }




  // THE LIGHT NOTIFICATION PART SAVE TEMP.TXT AT LINE 1102 FROM SUMIT


  function change_color(parameter,values,state,req){
    var input_id = '';

    if (parameter == 'temperature') {
      input_id = 'temp_in';
    }
    else if (parameter == 'humidity') {
      input_id = 'hum_in';
    }
    else if (parameter == 'moisture') {
      input_id = 'mos_in';
    }

    if(values == 'low'){
      var color = 'yellow';
    }
    else if(values == 'high'){
      var color = 'red';
    }
    else if(values == 'med'){
      var color = '#44bf44';
    }
    document.getElementById(parameter).style.borderLeftColor = color;
    document.getElementById(input_id).style.color = color;
  }




  function send_noti(parameter,values,state) {

    const greeting = new Notification(state+" "+parameter,{
      body : "current "+parameter+" is "+values+"er than set "+parameter,
      icon : "./icon/"+parameter+".png",

    });
  //   alert("current "+parameter+" is "+values+"er than set "+parameter);
    greeting.close();

  }

  var end_btn =  document.getElementById('end_btn');
  end_btn.onclick = function(){ end_gen(table,plant,1); }
}


//  ------------------------------ End Function -------------------

function end_gen(table,plant,getCmd) {
  var starNo = 0;

  let stars = document.getElementsByClassName("stars");

  for (let i = 0; i < stars.length; i++) {
    stars[i].onclick = function () {
      starNo = 6-(i+1);
      switch (starNo) {
        case 1:
          header.innerText = "worst";
          break;
        case 2:
          header.innerText = "bad";
          break;
        case 3:
          header.innerText = "acceptable";
          break;
        case 4:
          header.innerText = "very Good";
          break;
        case 5:
          header.innerText = "Excellent";
          break;
      }
    }  
  }
  let frame = document.getElementById('endGen_frame');
  frame.style.display = 'block';

  alert("Ending Genration will stop fetching data from Arduino")
  
  document.getElementById('set_gen_name').value = table;
  document.getElementById('set_plant_name').value = plant;

  var modal = document.getElementById("endGen_frame");
  var addGenFrame = document.getElementById("myModal");
  var span = document.getElementById("close_btn_2");

  span.onclick = function() {
    modal.style.display = "none";
    clear_input();
  }

  modal.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
      clear_input();
    }
  }
  function clear_input() {

    document.getElementById('get_growth').value = '';
    document.getElementById('get_disease').value = '';
    document.getElementById('get_dis_details').value = '';
  }

  document.getElementById('endgen_call_btn').onclick = function () {
     growth = document.getElementById('get_growth').value;
     diseaseName = document.getElementById('get_disease').value;
     diseaseDetails= document.getElementById('get_dis_details').value;

    //  var chk_url = "./insert_data.php?flag=4&name="+table+"&quality="+quality+"&growth="+growth+"&disName="+diseaseName+"&disDetails="+diseaseDetails;
    //     $.ajax({
    //           type: "POST",
    //           url: chk_url
    //         });

    $.get("./insert_data.php?flag=4&name="+table+"&quality="+starNo+"&growth="+growth+"&disName="+diseaseName+"&disDetails="+diseaseDetails, function(data){
      data = JSON.parse(data);
      if (data == 'success') {
        // $.get("./insert_data.php?flag=1&table_name=".table, function(data){
        //   console.log(data);
        // });
        $.ajax({
          type: "POST",
          url: "./insert_data.php?flag=1&table_name="+table
          });
          clear_input();
          modal.style.display = "none";
          if (getCmd == 1) {
            window.location.reload();
          }else{
            addGenFrame.style.display = "block";
          }
      }
      else{
        alert("Error While Updating data");
      }
    });
  }
}




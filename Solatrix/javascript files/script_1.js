/*Manual/Automatic Slideshow*/
function left_nav(){
    index = (index-1 < 0)? images.length-1 : index-1;
    carousal.style.backgroundImage = base_url+images[index]+'")';
    user_click = true;
    return false;
}
function right_nav(){
    index = (index+1 > images.length-1)? 0 : index+1;
    carousal.style.backgroundImage = base_url+images[index]+'")';
    user_click = true;
    return false;
}
function automatic(){
    if (!user_click){
        index = (index+1 > images.length-1)? 0 : index+1;
        carousal.style.backgroundImage = base_url+images[index]+'")';
    }
    else{
        setTimeout(function(){},7000);
        user_click = false;
    }
    return false;
}

/*Header Responsiveness*/
function dropdown(){
    links.style.display = (links.style.display == 'none')? 'grid':'none';
    mini_srch.style.display = "none";
    return true;
}
function hide_links(){
    if (window.innerWidth > 600){
        links.style.display = 'none';
        mini_srch.style.display = 'none';
    }
    return true;
}
function mini(){
    mini_srch.style.display = (mini_srch.style.display == 'none')? 'flex':'none';
    links.style.display = "none";
    return true; 
}

/*Products Filter*/
function pd_filter(){
    let pd_btn = event.currentTarget;
    let corresponding_pd = pd_dic[pd_btn.id];
    pd_btn.classList.add('selected');
    rst_btn.style.display = 'block';
    for (let i = 0; i < pds.length; i++){
        pds[i].style.display = (pds[i].id != corresponding_pd)? 'none': 'flex';
        if (pd_btns[i] !== pd_btn){
            pd_btns[i].classList.remove('selected');
        }
    }
    return false;
}
function reset(){
    for (let i = 0; i < pd_btns.length; i++){
        pds[i].style.display = 'flex';
        pd_btns[i].classList.remove('selected');
    }
    rst_btn.style.display = 'none';
    return true;
}

/*PV Loads Table Row Addition*/
function add_row(){
    var row = loads_table.insertRow(row_index);
    for(let i = 0; i<cell_order.length; i++){
        var cell = row.insertCell(i);
        cell.innerHTML = '<input type='+cell_input[i]+
                        'name='+cell_order[i]+(row_index+1)+'"'+
                        'class='+cell_order[i]+'"'+
                        '/>';
    }
    row_index++;
    return false;
}

/*PV Loads Table Reset*/
function rst(){
    loads_table.innerHTML = original_html;
    row_index = 2;
    return false;
}

/*PV System Sizing Calculations*/
function size(){
    //Check Location Access & Get Coordinates
    var longi = 0;
    var lat = 0;
    var hori_monthly_avg_daily_rad = 0;
    var peak_sunshine_hrs = 0;
    var parallel_panels_nb = 0;
    var series_panels_nb = 0;
    var total_panels_nb = 0;
    if(loc_req_check.checked && navigator.geolocation){
        navigator.geolocation.getCurrentPosition(getCoordinates, coordinatesFail);
        function getCoordinates(position){
            lat = parseFloat(position.coords.latitude); //latitude
            longi = parseFloat(position.coords.longitude); //longitude
            lat = lat*Math.PI/180; //latitude in degrees

            //Calculating the monthly average daily solar radiation of the entire year
            for (let month in n_dec_dic){
                let n = n_dec_dic[month][0];
                let dec = n_dec_dic[month][1]*Math.PI/180;
                let omega_s = Math.acos(-Math.tan(lat)*Math.tan(dec));
                let a = 1 + 0.033*Math.cos(360*n/365);
                let cos_theta_z = Math.cos(lat)*Math.cos(dec)*Math.sin(omega_s) + omega_s*Math.sin(lat)*Math.sin(dec);
                hori_monthly_avg_daily_rad += gsc_factor*a*cos_theta_z;
            }
            //Montlhy Daily Solar Radiation on a horizontal surface on Earth in Wh/m^2.day
            hori_monthly_avg_daily_rad = hori_monthly_avg_daily_rad*kt/(12*3600); 
            //Calculating peak sunshine hrs in hrs/day;
            peak_sunshine_hrs = hori_monthly_avg_daily_rad/1000;

            //Checking for missing selection
            var grid_tied = selects[2].options[selects[2].selectedIndex].value == 'grid-tied';
            for(let select of selects){
                if(select.options[select.selectedIndex].value == 'none'){
                    if(grid_tied){
                        console.log('here');
                        continue;
                    }
                    selection_err.innerHTML = "Please select "+select.name+"!";
                    return false;
                }
            }
            selection_err.innerHTML="";

            //Getting input from user
            var quantities = document.querySelectorAll(".qty");
            var powers = document.querySelectorAll(".power");
            var daily_hrs = document.querySelectorAll(".hrs");
            var weekly_days = document.querySelectorAll(".days");
            var total_load =  0;
            var inv_cap = 0;
            var design_I = 0;
            var nom_volt = 0;
            for (let i = 0; i< quantities.length; i++){
                //Checking for incorrect values
                if(parseFloat(daily_hrs[i].value) > 24 || parseFloat(weekly_days[i].value) > 7){
                    err_msg.innerHTML = 'Hourly use per day cannot be greater than 24 hours and Days used per week cannot be greater than 7 days!';
                    daily_hrs[i].style.backgroundColor = 'red';
                    weekly_days[i].style.backgroundColor = 'red';
                    return false;
                }
                else{
                    err_msg.innerHTML = "";
                    daily_hrs[i].style.backgroundColor = 'white';
                    weekly_days[i].style.backgroundColor = 'white';
                }

                //Calculating total equipment load in Wh/day
                var equip_load = parseFloat(quantities[i].value)*parseFloat(powers[i].value)
                                *parseFloat(daily_hrs[i].value)*parseFloat(weekly_days[i].value)/(7*0.85); 
                total_load += Math.abs(equip_load);
            }
            //Adjusting total equipment load
            total_load = total_load/(0.98*0.9);
            //Calculating Solar Inverter Capacity in W
            inv_cap = total_load*1.5/(0.8*peak_sunshine_hrs);
            total_load_cell.innerHTML = (Number.isNaN(total_load))? "Input Error":total_load.toFixed(2);
            inv_cap_cell.innerHTML = (Number.isNaN(inv_cap))? "Input Error":Math.ceil(inv_cap/100)*100;
            //Determining Nominal System Voltage in V
            var app = selects[0].options[selects[0].selectedIndex].value;
            var size = selects[1].options[selects[1].selectedIndex].value;
            nom_volt = nom_volt_dic[app][size];
            //Calculating Design Current in A
            design_I = total_load/(nom_volt*peak_sunshine_hrs);

            //Calculating Nb of Panels in Parallel
            parallel_panels_nb = Math.ceil(design_I/(0.9*isc));
            parallel_panels_cell.innerHTML = (Number.isNaN(total_load))? 'Input Error':parallel_panels_nb;
            //Calculating Nb of Panels in Series
            series_panels_nb = Math.ceil(nom_volt/vmp);
            series_panels_cell.innerHTML = (Number.isNaN(total_load))? 'Input Error':series_panels_nb;
            //Calculating Total Nb of Panels
            total_panels_nb = series_panels_nb*parallel_panels_nb;
            total_panels_cell.innerHTML = (Number.isNaN(total_load))? 'Input Error':total_panels_nb;

            if(!grid_tied){
                //Calculating Total Battery Load
                var bat_type = selects[3].options[selects[3].selectedIndex].value;
                var discharge_cap = bat_discharge_dic[bat_type];
                var bat_total_load = total_load/(discharge_cap*4);
                //Calculating Number of Batteries in Series
                var bat_sys_volt = nom_bat_sys_volt_dic[app][nom_volt];
                var series_bats_nb = Math.ceil(bat_sys_volt/nom_bat_volt);
                series_bats_cell.innerHTML = (Number.isNaN(total_load))? 'Input Error':series_bats_nb;
                //Calculating Total Number of Batteries
                var total_bat_nb = Math.ceil(bat_total_load/(nom_bat_volt*nom_bat_cap));
                total_bat_nb = (total_bat_nb > series_bats_nb)? total_bat_nb:series_bats_nb;
                //Calculating Number of Batteries in Parallel
                var parallel_bats_nb = Math.ceil(total_bat_nb/series_bats_nb);
                parallel_bats_cell.innerHTML = (Number.isNaN(total_load))? 'Input Error':parallel_bats_nb;
                total_bat_nb = parallel_bats_nb*series_bats_nb;
                total_bats_cell.innerHTML = (Number.isNaN(total_load))? 'Input Error':total_bat_nb;
            }
        }
        //If failed to get coordinates
        function coordinatesFail(){
            return false;
        }
    }
    else{
        err_msg.innerHTML = 'Location Access Denied';
    }
    return false;
}

//Show and Hide Batteries when 'Grid-Tied' is selected
function show_hide_bats(){
    let select_option = event.currentTarget;
    if (select_option.options[select_option.selectedIndex].value == 'grid-tied'){
        bat_in_tr.style.display = 'none';
        bat_out_tr.forEach((tr)=>tr.style.display = 'none');
    }
    else{
        bat_in_tr.style.display = 'table-row';
        bat_out_tr.forEach((tr)=>tr.style.display = 'table-row');
    }
    return true;
}

//Add row for fixtures table
function add_fix(){
    var row = fixtures_table.insertRow(fix_index);
    var fix_cell = row.insertCell(0);
    fix_cell.innerHTML = '<select name="fixture_list" id="fix_list'+fix_index+'" class="selected_fixture">'
                            +fixtures_options+'</select>';
    var qty_cell = row.insertCell(1);
    qty_cell.innerHTML = '<input type="number" name="qty'+fix_index+'" class="qty"/>';
    fix_index++;
    return false;
}

//Reset Fixtures Table
function rst_fix(){
    fixtures_table.innerHTML = original_fix;
    fix_index = 2;
    return false;
}

//Size Solar Water Heating System
function size_heat(){
    var application_list = document.getElementById('application');
    var application = application_list.options[application_list.selectedIndex].value;
    if (application == 'none'){
        selection_err.innerHTML = "Please select the application!";
        return false;
    }
    else{
        selection_err.innerHTML = "";
    }
    var selected_fixtures = document.querySelectorAll(".selected_fixture");
    var quantities = document.querySelectorAll('.qty');
    var sum = 0;
    var probable_demand = 0;
    var storage_cap = 0;
    var qi = 0;
    for (let i=0; i<selected_fixtures.length; i++){
        var fixture = selected_fixtures[i].options[selected_fixtures[i].selectedIndex].value;
        sum+=lph_dic[application][fixture]*parseInt(quantities[i].value);
    }
    probable_demand = sum*demand_factor_dic[application]; //L/h
    storage_cap = probable_demand*storage_factor_dic[application]; //L
    qi = 0.116204*probable_demand*temp_rise/eff; //W
    heat_input_cell.innerHTML = Math.ceil(qi);
    demand_cell.innerHTML = probable_demand.toFixed(2);
    storage_cell.innerHTML = Math.ceil(storage_cap);
    return false;
}

//Cycling of images in details page
function cycle(){
    let img = event.currentTarget;
    main_image.src = img.src;
    return false;
}

//Variables, Constants, and Elements
/*Index Page Carousal Elements*/
let images = ['image 1.jpg', 'image 2.jpg', 'image 3.jpg', 'image 4.jpg', 'image 5.jpg', 'image 7.jpg'];
const base_url = 'url("../resources/project images/';
let carousal = document.querySelector('#carousal');
let index = 0;
var user_click = false;
if(carousal != null){
    carousal.style.backgroundImage = 'url("../resources/project images/image 1.jpg")';
    window.setInterval(automatic,3000);
}

/*Responsive Header Buttons*/
const links = document.querySelector("#links");
const mini_srch = document.querySelector("#ss_search");
window.addEventListener('resize', hide_links);

/*Proudcts Page Elements*/
const pd_btns = document.querySelectorAll('.products_category');
if(pd_btns){
    for (let btn of pd_btns){
        btn.addEventListener('click',pd_filter);
    }
}
const pds = document.querySelectorAll('.product');
var pd_dic = {'solar_inv':'inv_containers', 'pv_panels':'pv_containers', 
            'heat_panels':'heat_containers', 'batteries':'bat_containers'};
const rst_btn = document.querySelector("#reset ion-icon");
if(rst_btn){
    rst_btn.addEventListener('click',reset);
}

/*PV Sizing Page Elements*/
    //Inputs
let row_index = 2;
const cell_order = ['"app', '"qty', '"power', '"hrs', '"days'];
const cell_input = ['"text"', '"number"', '"number"', '"number"', '"number"'];
var loads_table = document.getElementById("loads");
if(loads_table){
    var original_html = loads_table.innerHTML;
}
const loc_req_check = document.getElementById("location_request");
const selects = document.querySelectorAll("#app_type, #app_size, #system_type, #bat_type");
if(selects.length != 0){
    selects[2].addEventListener('change',show_hide_bats);
}
    //Outputs
        //Selection and Input Errors
const selection_err = document.getElementById('errors1');
const err_msg = document.getElementById("errors2");
        //Load and Inverter Capacity
const total_load_cell = document.getElementById("total_load");
const inv_cap_cell = document.getElementById("pwr_cap");
        //Panels
const total_panels_cell = document.getElementById("total_panels");
const series_panels_cell = document.getElementById("series_panels");
const parallel_panels_cell = document.getElementById("parallel_panels");
        //Batteries
const bat_in_tr = document.getElementById('bat_in_tr');
const bat_out_tr = document.querySelectorAll('.bat_out_tr');
const total_bats_cell = document.getElementById("total_bats");
const series_bats_cell = document.getElementById("series_bats");
const parallel_bats_cell = document.getElementById("parallel_bats");

//Solar PV Sizing Variables and Constants
const n_dec_dic = {'jan':[17,-20.9] , 'feb':[47,-13], 'mar':[75,-2.4],
                    'apr':[105,9.4], 'may':[135,18.8], 'june':[162,23.1],
                    'july':[198,21.2], 'aug':[228,13.5], 'sep':[258,2.2],
                    'oct':[288,-9.6], 'nov':[318,-18.9], 'dec':[344,-23]};
const gsc_factor = 24*3600*1367/Math.PI; //W/m^2
const kt = 0.75; //Clearness Index - Slightly Hazy
const diffuse_ratio = 0.18; //Hd/H ratio for kt = 0.75
const nom_volt_dic = {'house':{'small':200, 'medium':350, 'large':500}, 
                    'industrial/commercial':{'small':600, 'medium':1000, 'large':1500},
                    'food':{'small':600, 'medium':1000, 'large':1500},
                    'other':{'small':600, 'medium':1000, 'large':1500}}; //V
const nom_bat_sys_volt_dic = {'house':{200:24, 350:48, 500:96}, 
                    'industrial/commercial':{600:150, 1000:280, 1500:400},
                    'food':{600:150, 1000:280, 1500:400},
                    'other':{600:150, 1000:280, 1500:400}}; //V
const vmp = 40; //V
const isc = 11; //A
const bat_discharge_dic = {'lithium': 1, 'lead-acid': 0.5, 'gel': 0.7};
const nom_bat_volt = 12; //V
const nom_bat_cap = 200; //Ah

/*Solar Heating Page Elements*/
    //Solar Heating Sizing Variables and Constants
let fix_index = 2;
const eff = 0.4; //Average efficiency of flate plate solar collectors
const temp_rise = 45; //degree C
const lph_dic = {'apartment':{'private lavatory':7.6, 'public lavatory':15, 'bathtub':76, 'dishwasher':57, 'kitchen sink':38, 'shower':114, 'service sink':76, 'washing machine':76}, 
                'club':{'private lavatory':7.6, 'public lavatory':23, 'bathtub':76, 'dishwasher':190, 'kitchen sink':76, 'shower':568, 'service sink':76, 'washing machine':76},
                'gym':{'private lavatory':7.6, 'public lavatory':30, 'bathtub':114, 'dishwasher':0, 'kitchen sink':0, 'shower':850, 'service sink':0, 'washing machine':0},
                'hospital':{'private lavatory':7.6, 'public lavatory':23, 'bathtub':76, 'dishwasher':190, 'kitchen sink':76, 'shower':284, 'service sink':76, 'washing machine':106},
                'hotel':{'private lavatory':7.6, 'public lavatory':30, 'bathtub':76, 'dishwasher':190, 'kitchen sink':114, 'shower':284, 'service sink':114, 'washing machine':106},
                'plant':{'private lavatory':7.6, 'public lavatory':45.5, 'bathtub':0, 'dishwasher':76, 'kitchen sink':76, 'shower':850, 'service sink':76, 'washing machine':0},
                'office':{'private lavatory':7.6, 'public lavatory':23, 'bathtub':0, 'dishwasher':0, 'kitchen sink':76, 'shower':114, 'service sink':76, 'washing machine':0},
                'residence':{'private lavatory':7.6, 'public lavatory':0, 'bathtub':76, 'dishwasher':57, 'kitchen sink':38, 'shower':114, 'service sink':57, 'washing machine':76},
                'school':{'private lavatory':7.6, 'public lavatory':57, 'bathtub':0, 'dishwasher':76, 'kitchen sink':76, 'shower':850, 'service sink':76, 'washing machine':106}}; //Liters of water per hour per fixture
const demand_factor_dic = {'apartment':0.3, 'club':0.3, 'gym':0.4, 'hospital':0.25, 'hotel':0.25, 'plant':0.4, 'office':0.3, 'residence':0.3, 'school':0.4};
const storage_factor_dic = {'apartment':1.25, 'club':0.9, 'gym':1, 'hospital':0.6, 'hotel':0.8, 'plant':1, 'office':2, 'residence':0.7, 'school':1};
    //Inputs
var fixtures_table = document.getElementById('fixtures');
if(fixtures_table){
    var original_fix = fixtures_table.innerHTML;
    var fixtures_options = document.getElementById('fix_list1').innerHTML;
}
    //Outputs
const heat_input_cell = document.getElementById('heat_input');
const demand_cell = document.getElementById('demand');
const storage_cell = document.getElementById('storage');

/*Details Page Elements*/
const small_images = document.querySelectorAll('.smol');
const main_image = document.getElementById('main_img');
if(small_images.length > 0){
    for (var img of small_images){
        img.addEventListener('click',cycle);
    }
}
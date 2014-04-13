<!--scripts-->
<!-- scripts for this page -->
<script src="<?php echo base_url(); ?>assets2/js/jquery-latest.js"></script>
<script src="<?php echo base_url(); ?>assets2/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets2/js/jquery-ui-1.10.2.custom.min.js"></script>

<!-- call all plugins -->
<script src="<?php echo base_url(); ?>assets2/js/theme.js"></script>

<!--call chart libs-->
<script src="<?php echo base_url(); ?>assets2/js/libs/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets2/js/libs/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets2/js/mycharts.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-tabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });

        //hide project details holder
        $('#close').click(function(){
           $('#p_details').fadeOut();
        });

        //comments grub n push function..
        $('#comment_btn').click(function(){
           var commnt= $('#comment').val();
           var id= $('#p_id').val();
            if(commnt == "" || commnt <= 5){
                if(commnt == ""){
                    $('#err1').fadeIn();
                }
            }
            else{
                $('#err1').fadeOut();
                $('#feeds').removeClass().addClass('cool').html('<p id="err1"><img src="../assets2/img/load.gif" align="center" style="margin-top:4px;" /></p>').fadeIn('fast');
                var formData= $('#sentiment').serialize();
                submit(formData);//call submit function..
            }
        });
        //---end comment push function

        //Flag grub n push function..
        $('#flag_btn').click(function(){
            var commnt= $('#comment2').val();
            var id= $('#p_id').val();
            var allegment= $('#all').val();

            if(commnt == "" || commnt <= 5 || allegment == ""){
                if(commnt == ""){
                    $('#err2').fadeIn();
                }
                else if(commnt <= 5){
                    $('#err2').fadeIn();
                }
                if(allegment == ""){
                    $('#err3').fadeIn();
                }
            }
            else{
                $('#err2').fadeOut();
                $('#err3').fadeOut();
                $('#feeds2').removeClass().addClass('cool').html('<p id="err1"><img src="../assets2/img/load.gif" align="center" style="margin-top:4px;" /></p>').fadeIn('fast');
                var flagData= $('#flag').serialize();
                submit_flags(flagData);//call submit function..
            }
        });
        //----end flag push function

        $('#visualize_one').click(function(){

            //add reveal code to show loader b4 data is retrieved
            var frmData=$('form').serialize();
            sector_data_grub(frmData);
            mtfe_data_grub(frmData);
            project_budget_grub(frmData);
            project_per_county();
        });

    });
    //ajax submit function to save data
    function submit(formData){
        $.ajax({
            type: 'post',
            url: '<?php echo('search/save'); ?>',
            data: formData,
            // dataType: 'html',
            cache: false,
            timeout:7000,
            success: function (data){
                $('#feeds').addClass('done').html(data).fadeIn('fast');
            },
            complete: function (XMLHttpRequest,status){
                $('#sentiment') [0].reset();
                $('#feeds').fadeOut(30000);
            }
        });
    };

    function submit_flags(flagData){
        $.ajax({
            type: 'post',
            url: '<?php echo('search/save_flag'); ?>',
            data: flagData,
            // dataType: 'html',
            cache: false,
            timeout:7000,
            success: function (data){
                $('#feeds2').addClass('done').html(data).fadeIn('fast');
            },
            complete: function (XMLHttpRequest,status){
                $('#flag') [0].reset();
                $('#feeds2').fadeOut(30000);
            }
        });
    };



    //Data get ajax calls;

    //function to get total number of projects being undertaken per county
    function project_per_county(){
        $.ajax({
            type: 'get',
            url: '<?php echo('analytics/total_projects'); ?>',
             //data: frmData,
            dataType: 'json',
            cache: false,
            timeout:7000,
            success: function (data){
                //console.log(data);

                var values = new Array();
                for(var x =0; x <=46 ; x++){
                  values[x] = parseInt(data[x]);
                }
                console.log(values);
                project_per_county_chart(data);
            },
            complete: function (XMLHttpRequest,status){
                //hide loader gif
            }
        });

    }

    function mtfe_data_grub(frmData){
        $.ajax({
            type: 'post',
            url: '<?php echo('analytics/mtfe_count_get'); ?>',
            data: frmData,
            dataType: 'json',
            cache: false,
            timeout:7000,
            success: function (data){
                //$('#feeds').addClass('done').html(data).fadeIn('fast');
                //show loader gif..
                mtfe_chart(data);
            },
            complete: function (XMLHttpRequest,status){
                //hide loader gif
            }
        });
    };

    function sector_data_grub(frmData){
        $.ajax({
            type: 'post',
            url: '<?php echo('analytics/sector_count_get'); ?>',
            data: frmData,
            dataType: 'json',
            cache: false,
            timeout:7000,
            success: function (data){
                //$('#feeds').addClass('done').html(data).fadeIn('fast');
                //show loader gif..
                sector_chart(data);
            },
            complete: function (XMLHttpRequest,status){
                //hide loader gif
            }
        });
    };

    function project_budget_grub(frmData){
        $.ajax({
            type: 'post',
            url: '<?php echo('analytics/project_budgets'); ?>',
            data: frmData,
            dataType: 'json',
            cache: false,
            timeout:7000,
            success: function (data){
                //$('#feeds').addClass('done').html(data).fadeIn('fast');
//               console.log(data[0]);
//
//               console.log(data[0],data[1],data[2],data[3],data[4],data[5],data[6]);
               var dt= [data[0],data[1],data[2],data[3],data[4],data[5],data[6]];
               budget_chart(dt);
            },
            complete: function (XMLHttpRequest,status){
//                $('form') [0].reset();
//                $('#feeds').fadeOut(30000);
                //call sector pie chart draw function
                //alert("I'm done");
            }
        });
    };

    //Function to load project info onto DOM
    function load_info(id){

        var details = id.split("|");
        //var chart = $('#chart_canvas').highcharts();
        //append project info to DOM Elements;
        //basic information
        $('#p_name').html(details[0]);
        $('#p_overall').html(details[0]);
        $('#p_county').html(details[1]);
        $('#p_loc').html(details[2]);
        $('#p_sector').html(details[3]);
        $('#p_sector_two').html(details[4]);
        $('#p_tasks').html(details[5]);
        $('#p_output').html(details[6]);
        $('#p_status').html(details[7]);
        $('#p_remarks').html(details[8]);

        //costing information..
        $('#p_estimate').html(details[9]);
        var dt= [details[10],details[11],details[12],details[13],details[14],details[15],details[16]];
        drawchart(dt); //call graph draw function..
        $('#p_id').val(details[17]); //project id as an identifier..
        $('#p_id2').val(details[17]); //project id as an identifier..
        $('#p_id_user').val(<?php echo ($this->session->userdata('id'));?>);
        $('#p_id_user2').val(<?php echo ($this->session->userdata('id'));?>);
        $('#p_details').fadeIn(); //show the project details div
    }//end load info function

</script>

<?php

    if(isset($map)){
        echo $map['js'];
    }

?>

</body>

</html>
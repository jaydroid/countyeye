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
                $('#err1').fadeIn();
            }
            else{
                $('#err1').fadeOut();
                $('#feeds').removeClass().addClass('cool').html('<p id="err1"><img src="../assets2/img/load.gif" align="center" style="margin-top:4px;" /></p>').fadeIn('fast');
                var formData= $('form').serialize();
                submit(formData);//call submit function..
            }
        });

        $('#visualize_one').click(function(){

            //add reveal code to show loader b4 data is retrieved
            var frmData=$('form').serialize();
            sector_data_grub(frmData);
            mtfe_data_grub(frmData);
            project_budget_grub(frmData);
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
                $('form') [0].reset();
                $('#feeds').fadeOut(30000);
            }
        });
    };

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
               console.log(data[0],data[1],data[2],data[3],data[4],data[5],data[6]);
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
        $('#p_id_user').val(<?php echo ($this->session->userdata('id'));?>);
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
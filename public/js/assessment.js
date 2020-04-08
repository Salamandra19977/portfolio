var assessment = null;
var work_id = 0;

$('.like').click(function(event){
    var canvasLike = $(this);
    var canvasDisLike = $(this).parent().parent().children('.dislikeBox');
    canvasDisLike.children().removeClass('assessment');
    if(!$(this).hasClass('assessment')){
        $(this).addClass('assessment');
    }
    else {
        $(this).removeClass('assessment')
    }
    work_id = $(this).parent().data('workid');
    assessment = 1;
    $.ajax({
        type:"POST",
        url: urlAssessment,
        data:{work_id:work_id, assessment: assessment, _token: token},
        success: function (data) {
            canvasLike.children('span').text(data['countLike']);
            canvasDisLike.children('button').children('span').text(data['countDisLike']);
        }
    });
});

$('.dislike').click(function(event){
    var canvasDisLike = $(this);
    var canvasLike = $(this).parent().parent().children('.likeBox');
    canvasLike.children().removeClass('assessment');
    if(!$(this).hasClass('assessment')){
        $(this).addClass('assessment');
    }
    else {
        $(this).removeClass('assessment')
    }
    work_id = $(this).parent().data('workid');
    assessment = 0;
    $.ajax({
        type:"POST",
        url: urlAssessment,
        data:{work_id: work_id, assessment: assessment, _token: token},
        success:function (data) {
            canvasLike.children('button').children('span').text(data['countLike']);
            canvasDisLike.children('span').text(data['countDisLike']);
        }
    })
});
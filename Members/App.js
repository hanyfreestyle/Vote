$(document).ready(function(){

    var Pc_logoDiv = $('.Pc_logoDiv').height();
    var newHeight = $(window).height();
    var PC_LeftDiv = $(window).height();
    var Pc_MainDiv = newHeight-Pc_logoDiv;


    $(".Pc_MainDiv").height(Pc_MainDiv);
    $(".PC_LeftDiv").height(PC_LeftDiv);

    var Pc_HomeFormLogin = $('.Pc_HomeFormLogin').height();
    var Pc_HomeFormLogin_m = (Pc_MainDiv - Pc_HomeFormLogin) / 2;
    $(".Pc_HomeFormLogin").css("margin-top",Pc_HomeFormLogin_m-30);


    var ThisReqLogoDiv = $("#ThisReqLogoDiv").height();
    var HomeBack_mobile = $(window).height();
    var HomeBack_mobileNow = HomeBack_mobile-ThisReqLogoDiv;

    $(".HomeBack_mobile").height(HomeBack_mobileNow);

    $(".Pc_MainDiv_Back").height(Pc_MainDiv);



    var Pc_CenterDiv = $(".Pc_CenterDiv").height();
    var newHeight = (Pc_MainDiv - Pc_CenterDiv) / 2;
    $(".Pc_CenterDiv").css("margin-top",newHeight);


    var PC_LeftDiv = $('.PC_LeftDiv').height();
    var LeftPcSideBar = $('.LeftPcSideBar').height();
    var LeftPcSideBar_margin = (PC_LeftDiv - LeftPcSideBar) / 2;
    $(".LeftPcSideBar").css("margin-top",LeftPcSideBar_margin);

    var PageListMobile = $('.PageListMobile').height();
    var PageListMobile_margin = (HomeBack_mobileNow - PageListMobile) / 2;
    $(".PageListMobile").css("margin-top",PageListMobile_margin);


    var SurveysMobileAddForm = $('.SurveysMobileAddForm').height();
    var SurveysMobileAddForm_margin = (HomeBack_mobileNow - SurveysMobileAddForm) / 2;
    $(".SurveysMobileAddForm").css("margin-top",SurveysMobileAddForm_margin);


    var MainTableViewList_PC = $('.MainTableViewList_PC').height();
    var MainTableViewList_PC_margin = (Pc_MainDiv - MainTableViewList_PC) / 2;
    $(".MainTableViewList_PC").css("margin-top",MainTableViewList_PC_margin);

    $(".MobileForm_CenterDiv").height(HomeBack_mobileNow-100);




});
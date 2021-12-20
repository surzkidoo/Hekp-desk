data =[
    {
        project_title:"my portfolio",
        project_des:"This is actually my first design in portfolio",
        skill_set:"java,php,html,css,bootstrap,jquery",
       project_pic:["logol.png","img2.png"]

    },
    {
        project_title:"header",
        project_des:"portfolio",
        skill_set:"java,php",
        project_pic:["CaptureA.PNG","logol.png"]
    },
    {
        project_title:"header",
        project_des:"portfolio",
        skill_set:"java,php",
        project_pic:["img1.png","img2.png"]
        
    },
    {
        project_title:"header",
        project_des:"portfolio",
        skill_set:"java,php",
        project_pic:["img1.png","img2.png"]
        
    }
]
i=0;
$(".play").on("click",function(){
    
    if(i<data.length){
    obj=data[i];
    $(".prot").text(obj.project_title);
    $(".prod").text(obj.project_des);
    $(".protime").text(obj.skill_set);
    setTimeout(crl(obj.project_pic),2000);
    $(".prolink").text("www.com");
    i++;
}
else{
    i=0;
}

});

j=0
function crl(name){
   
    if(j<name.length){
        $(".proimg").attr("src",name[j]);
        j++;
    }
    else{
        j=0;
    }
}


  

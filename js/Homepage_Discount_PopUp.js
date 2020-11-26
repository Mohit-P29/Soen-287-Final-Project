var c=0;

function pop() {
    if (c==0)
        {
            document.getElementById("discount_popup").style.display = "block";
            c=1;
            document.getElementById("discount_body_opacity1").style.opacity = 0.2;
            document.getElementById("discount_body_opacity2").style.opacity = 0.2;
            document.getElementById("discount_body_opacity3").style.opacity = 0.2;

        }
    else
        {
            document.getElementById("discount_popup").style.display = "none";
            c=0;
            document.getElementById("discount_body_opacity1").style.opacity = 1.0;
            document.getElementById("discount_body_opacity2").style.opacity = 1.0;
            document.getElementById("discount_body_opacity3").style.opacity = 1.0;
            
        }
}

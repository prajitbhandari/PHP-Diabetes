Male <input type="radio" onclick="javascript:genderCheck();" name="gender" id="maleCheck"> 
Female <input type="radio" onclick="javascript:genderCheck();" name="gender" id="femaleCheck"><br>
    <div id="ifYes" style="visibility:hidden">
        Pregnancies: <input type='text' id='yes' name='yes'><br>
        
    </div>
        
        

        <script type="text/javascript">
          
            function genderCheck() {
              if (document.getElementById('femaleCheck').checked) {
              document.getElementById('ifYes').style.visibility = 'visible';
            }
          else document.getElementById('ifYes').style.visibility = 'hidden';
        }
        </script>
 

 

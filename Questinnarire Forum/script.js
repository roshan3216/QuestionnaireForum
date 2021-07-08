var save = document.getElementById("save-post");
var dis_card = document.getElementById("discard-post");
var addTopic = document.getElementById("topicButton");
var control = document.getElementById("topic_content");
var logOut = document.getElementById("log_out");
var showTopics = document.getElementById("showTopics");
var topicArray = new Array();
topicCount = 0;
control.style.display = "none";


$("#topicButton").delegate(addTopic, "click", function() {
    // content.style.display = "block";
    // return false;
    //alert("Add topic Button clicked");
    control.style.display = "block";

});
$("#discard-post").delegate(dis_card, "click", function() {
    control.style.display = "none";
    return false;
    //alert("Dis card button clicked<br/>");
});


save.onclick = function() {

    var subject = document.getElementById("subject").value;
    var comment = document.getElementById('comment').value;
    console.log(subject);
    console.log(comment);
    // subject = sub;
    // comment = cmnt;
    if (subject && comment) {
        $.ajax({
            type: "POST",
            url: "topics.php",
            data: {
                sub: subject,
                cmnt: comment,

            },
            success: function() {
                alert("Form submitted successfully");
                getData(topicCount);
            }
        })
        return false;
    } else {
        alert("Fill in the data ");
        return false;
    }
    // console.log(subject);
    // console.log(comment);
};

//Setting up the database and retrieving the data
function getData(i) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "topics.php", true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("topic_content").innerHTML = this.responseText;
            //alert("ALeerthfd");
            //alert(this.responseText);
            //console.log(this.responseText);
            data = JSON.parse(this.responseText);
            console.log(data);
            //var control = document.getElementById("data");
            //var html = "";
            console.log(this.responseText);
            for (i; i <= data.length; i++) {
                showData(i, data[i]['id'], data[i]['sub'], data[i]['subComment'], data[i]['likes'], data[i]['dislikes'], data[i]['commentCount']);
                topicCount++;




            }
            console.log("topic count= " + (topicCount - 1));
            /*
            //Looping through the data
            for (var i = 0; i < data.length; i++) {
                var subject = data[i].sub;
                var comment = data[i].comment;
                html += "<tr>";
                html += "td" + subject + "</td>";
                html += "td" + comment + "</td>";
                html += "</tr>";
            }
            //document.getElementById("data").innerHTML=html;
            control.innerHTML = html;
            */
        }
    };

}

function showData(i, id, subject, subComment, upvotes, downvotes, commentCountTrack) {
    /*
    topicArray[i] = document.createElement("div");
    topicArray[i].name = username;
    topicArray[i].id = id;
    topicArray[i].comment = comment;
    */
    topicID = id;
    topicSubject = subject;
    topicComment = subComment;
    topicArray[i] = document.createElement("div");
    topicArray[i].style.textAlign = "left";
    topicArray[i].style.marginBottom = "30px";
    topicArray[i].style.position = "relative";
    topicArray[i].style.left = "10%";
    topicArray[i].id = topicID;
    topicArray[i].style.width = "80%";
    topicArray[i].style.height = "100px";
    topicArray[i].style.backgroundColor = "transpaent";
    document.body.appendChild(topicArray[i]);


    heading = document.createElement("h2");
    heading.style.padding = "5px";
    // heading.style.color = "rgb(39, 24, 132)";
    heading.style.color = "white";
    heading.style.fontFamily = "Dancing Script";
    heading.style.margin = "20px";
    heading.style.borderBottom = "2px white solid";
    heading.style.height = "30px";
    heading.innerHTML = "Sub :  " + topicSubject;
    heading.style.width = "auto";
    heading.style.fontSize = "25px";
    heading.style.position = "relative";
    topicArray[i].append(heading);


    content = document.createElement("p");
    //content.style.padding = "10px";
    content.width = "auto";
    content.style.position = "relative";
    // content.style.top = "10px";
    content.innerHTML = "Comment : " + topicComment;
    // content.color = "yellow";
    content.style.color = "#100d3f";
    content.backgroundColor = "rgb(190, 240, 80)";
    content.style.fontFamily = "Dancing Script";
    content.style.width = "auto";
    content.style.fontSize = "25px";
    content.style.padding = "0 10px 0 10px";
    content.style.color = "#100d3f";
    topicArray[i].append(content);

    organiseContentDiv = document.createElement("div");
    organiseContentDiv.height = "20px";
    organiseContentDiv.width = "80%";
    organiseContentDiv.setAttribute("class", "divContent");
    //organiseContentDiv.display = "inline-block";
    organiseContentDiv.backgroundColor = "#c0c0c0";
    topicArray[i].appendChild(organiseContentDiv);

    h4Likes = document.createElement("h4");
    //h4Likes.width = "30%";
    h4Likes.style.position = "relative";
    h4Likes.margin = "10px";
    h4Likes.padding = "5px";
    h4Likes.innerHTML = "Likes  : " + upvotes;
    h4Likes.color = "cyan";
    h4Likes.style.fontSize = "15px";
    h4Likes.style.textAlign = "center";
    //h4Likes.style.display = "inline";
    organiseContentDiv.append(h4Likes);


    h4Dislikes = document.createElement("h4");
    //h4Dislikes.width = "30%";
    h4Dislikes.style.position = "relative";
    h4Dislikes.margin = "10px";
    h4Dislikes.padding = "5px";
    h4Dislikes.innerHTML = "Dislikes  : " + downvotes;
    h4Dislikes.color = "cyan";
    h4Dislikes.style.fontSize = "15px";
    h4Dislikes.style.textAlign = "center";
    //h4dislikes.style.display = "inline";
    organiseContentDiv.append(h4Dislikes);


    commNos = document.createElement("h4");
    //commNos.width = "30%";
    commNos.style.position = "relative";
    commNos.margin = "10px";
    commNos.padding = "5px";
    commNos.innerHTML = "Comment  : " + commentCountTrack;
    commNos.color = "cyan";
    commNos.style.fontSize = "15px";
    commNos.style.textAlign = "center";
    //commNos.style.display = "inline";
    organiseContentDiv.append(commNos);
}



//Calling the funciton to show data on the browser
if (topicCount == 0) {
    getData(topicCount);
}


/*
addTopic.onclick = function(e) {
    if (e.target.id = "topicButton") {
        e.preventDefault;
        showForm();
    }
};
dis_card.onclick = function(e) {
    if (e.target.id = "discard-post") {
        e.preventDefault;
        discardForm();
    }
};
*/

function trash() {
    /*
    function showForm() {
        if (content.style.display == "none") {
            content.style.display = "block";
        } else {
            content.style.display = "none";
        }
        return false;
    }

    function discardForm() {
        content.style.display = "none";
        return false;
    }
    */


    /*
    addTopic.addEventListener("click", function() {
        content.style.display = "block";
        return false;
    });
    dis_card.addEventListener("click", function() {
        content.style.display = "none";
        return false;
    });
    */
}

window.onload = function() {

};


// Whenever we want to use jQuery we do so by using the symbol "$()"

// e.g. var variable= $("#id or .class or any pseudo class");


// To add the attribues like class or id
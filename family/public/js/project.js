project = {
    init: function() {
        //console.log("project.js is running, yo");
        project.view.init();
    },
    
    view: {
        init: function() {
            if(document.querySelectorAll('.view').length > 0) {
                //console.log("view init running");
                this.setThermometer();
            }
        },
        
        setThermometer: function() {
            var goal = document.getElementById('goal').textContent;
            var confirmed = document.getElementById('confirmed').textContent;
            var promised = document.getElementById('promised').textContent;
            
            var tracker = document.getElementById('donationTracker');
            var promisedTrack = document.getElementById('donationPromised');
            var confirmedTrack = document.getElementById('donationConfirmed');
            
            var trackerHeight = parseInt(window.getComputedStyle(tracker).getPropertyValue('height'));
            var dollarScale = trackerHeight / goal;
            
            promisedTrack.style.height = promised * dollarScale;
            confirmedTrack.style.height = confirmed * dollarScale;
            
            //console.log("Confirmed: " + confirmed);
            //console.log("Promised: " + promised);
        }
    }
};

window.onload = project.init;
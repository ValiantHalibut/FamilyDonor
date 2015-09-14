project = {
    init: function() {
        project.view.init();
    },
    
    view: {
        init: function() {
            if(document.querySelectorAll('.view').length > 0) {
                this.setThermometer();
            }
        },
        
        setThermometer: function() {
            var goal = document.getElementById('goal').textContent;
            var confirmed = document.getElementById('confirmed').textContent;
            var promised = document.getElementById('promised').textContent;
            
            //goal = goal.substr(1);
            confirmed = confirmed.substr(1);
            promised = promised.substr(1);
            console.log(goal);
            console.log(confirmed);
            console.log(promised);
            
            var tracker = document.getElementById('donationTracker');
            var promisedTrack = document.getElementById('donationPromised');
            var confirmedTrack = document.getElementById('donationConfirmed');
            
            var trackerHeight = parseInt(window.getComputedStyle(tracker).getPropertyValue('height'));
            var dollarScale = trackerHeight / goal;
            
            promisedTrack.style.height = promised * dollarScale;
            confirmedTrack.style.height = confirmed * dollarScale;
        }
    }
};

window.onload = project.init;
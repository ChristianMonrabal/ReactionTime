document.addEventListener('DOMContentLoaded', function() {
    const lights = [
        document.getElementById('light1'),
        document.getElementById('light2'),
        document.getElementById('light3'),
        document.getElementById('light4'),
        document.getElementById('light5')
    ];
    const reactionButton = document.getElementById('reactionButton');
    const resetButton = document.getElementById('resetButton');
    const result = document.getElementById('result');
    
    let startTime;
    let allLightsOff = false;
    let attemptCount = 0;
    const maxAttempts = 1;
    
    function startSequence() {
        let index = 0;
        allLightsOff = false;
        
        function turnOffNextLight() {
            if (index < lights.length) {
                lights[index].classList.remove('red');
                index++;
                setTimeout(turnOffNextLight, 1000);
            } else {
                const randomDelay = Math.random() * 2000 + 1000;
                setTimeout(() => {
                    lights[1].classList.add('green');
                    lights[3].classList.add('green');
                    allLightsOff = true;
                    startTime = new Date().getTime();
                }, randomDelay);
            }
        }
        
        turnOffNextLight();
    }
    
    reactionButton.addEventListener('click', function() {
        if (attemptCount >= maxAttempts) {
            return;
        }
        attemptCount++;
        const endTime = new Date().getTime();
        
        if (!allLightsOff) {
            result.innerText = "Salida anticipada";
        } else {
            const reactionTime = endTime - startTime;
            result.innerText = `Tu tiempo de reacción es: ${reactionTime} ms`;
        }

        reactionButton.style.display = 'none';
        if (attemptCount >= maxAttempts) {
            resetButton.style.display = 'block';
        }
    });
    
    resetButton.addEventListener('click', function() {
        location.reload();
    });
    
    function resetLights() {
        lights.forEach(light => {
            light.classList.remove('green');
            light.classList.add('red');
        });
    }

    startSequence();
});

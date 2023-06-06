import Chart from 'https://cdn.jsdelivr.net/npm/chart.js';

const information = (target, data) => {
    const informations = Object.values(data).filter((obj) => obj.name === target);
    return informations;
};

const generateChart = (type, data) => {
    document.getElementById('chart').remove();
    const ctx = document.createElement('canvas');
    ctx.id = "chart";
    document.getElementById('main-access-stats').append(ctx);

    new Chart(ctx, {
        type: type,
        data: {
            labels: [
                'dark mode',
                'Focus help',
                'letter spacing',
                'word spacing',
                'line spacing',
                'custom font',
                'blue light reducer',
                'font size',
                'image saturation'
            ],
            datasets: [{
                label: 'Nb of users',
                data: [information('theme_celene4boost_mode', data).length,
                information('theme_celene4boost_parkinson', data).length,
                information('theme_celene4boost_letter', data).length,
                information('theme_celene4boost_word', data).length,
                information('theme_celene4boost_line', data).length,
                information('theme_celene4boost_font', data).length,
                information('theme_celene4boost_blue', data).length,
                information('theme_celene4boost_fontsize', data).length,
                information('theme_celene4boost_lowsat', data).length
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
};

export default { information, generateChart };
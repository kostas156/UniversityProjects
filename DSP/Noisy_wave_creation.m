clear; clc;
[guit1, Fs] = audioread('guit1.wav');
n = length(guit1);
%plot(1:length(y), y)

%Create Gaussian White Noise with variance 0.1
white_noise = 0.01*randn(n, 1);

%Check variance rounded to first 2 decimal digits
fprintf("Typical Deviation value = ");
disp(std(white_noise));

%Add noise to audio file
noisy_y = guit1 + white_noise;

audiowrite('white_noise.wav', white_noise, Fs);
audiowrite('noisy.wav', noisy_y, Fs);


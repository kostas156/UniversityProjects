clear; clc; close all
%Task c
%==========================================================================
%Load wav file
[y, Fs] = audioread('guit1.wav');
white_noise = audioread('white_noise.wav');
n = length(y);

p = 10;

rss = xcorr(white_noise);
rxx = rss(n:n+p-1);
rss = rss(n+1:n+1+p-1);

Rxx = toeplitz(rxx);
w = Rxx\rss;
z = filter(w, 1, white_noise);

fprintf("Mean value of noise is:");
disp(round(mean(white_noise),5));
figure; plot(white_noise); hold on; plot(z, 'r'); hold off;
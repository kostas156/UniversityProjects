clear; clc; close all
%Task a
%Load wav files
[y, Fs] = audioread('guit1.wav');
white_noise = audioread('white_noise.wav');
noisy_y = audioread('noisy.wav');
n = length(y);
snr_vec = 20*log10(norm(y)/norm(noisy_y-y));
%Plot a combined graph of noisy and starting waves between values 1000 and
%1250

tiledlayout(2,1);
ax1 = nexttile;
plot(ax1, 750:1500, y(750:1500))
axis([1000, 1250, -0.6, 0.6])
title(ax1, 'Original waveform')

ax2 = nexttile;
plot(ax2, 750:1500, noisy_y(750:1500))
axis([1000, 1250, -0.6, 0.6])
title(ax2, 'Noisy waveform')

%Wiener order p=10
p = 10;
rxx = xcorr(noisy_y);
rxd = xcorr(noisy_y, y);
rxx = rxx(n:n+p-1);
rxd = rxd(n:n+p-1);

Rxx = toeplitz(rxx);
w = Rxx\rxd;  % It is the same as inv(Rxx)*rxd

z10 = filter(w, 1, noisy_y);
snr_vec = [snr_vec 20*log10(norm(y)/norm(z10-y))];
audiowrite('wiener10_a.wav', z10, Fs);

%Wiener order p=20
p = 20;
rxx = xcorr(noisy_y);
rxd = xcorr(noisy_y, y);
rxx = rxx(n:n+p-1);
rxd = rxd(n:n+p-1);

Rxx = toeplitz(rxx);
w = Rxx\rxd;

z20 = filter(w, 1, noisy_y);
snr_vec = [snr_vec 20*log10(norm(y)/norm(z20-y))];
audiowrite('wiener20_a.wav', z20, Fs);

%Wiener order p=30
p = 30;
rxx = xcorr(noisy_y);
rxd = xcorr(noisy_y, y);
rxx = rxx(n:n+p-1);
rxd = rxd(n:n+p-1);

Rxx = toeplitz(rxx);
w = Rxx\rxd;

z30 = filter(w, 1, noisy_y);
snr_vec = [snr_vec 20*log10(norm(y)/norm(z30-y))];

audiowrite('wiener30_a.wav', z30, Fs);

figure
tiledlayout(4,1);
ax1 = nexttile;
plot(ax1, 750:1500, noisy_y(750:1500))
axis([1000, 1250, -0.6, 0.6])
title(ax1, 'Noisy waveform')

ax2 = nexttile;
plot(ax2, 750:1500, z10(750:1500))
axis([1000, 1250, -0.6, 0.6])
title(ax2, 'After using Wiener Filter with p=10')

ax3 = nexttile;
plot(ax3, 750:1500, z20(750:1500))
axis([1000, 1250, -0.6, 0.6])
title(ax3, 'After using Wiener Filter with p=20')

ax4 = nexttile;
plot(ax4, 750:1500, z30(750:1500))
axis([1000, 1250, -0.6, 0.6])
title(ax4, 'After using Wiener Filter with p=30')


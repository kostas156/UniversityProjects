clear; clc; close all;
%Task b
%==========================================================================
%Load wav file
[y, Fs] = audioread('guit1.wav');
white_noise = audioread('white_noise.wav');
noisy_y = audioread('noisy.wav');
n = length(y);
plot(1:length(y), noisy_y)

snr_vec = 20*log10(norm(y)/norm(noisy_y-y));
win_size = 256;
frames_original = frame_wind(y, win_size, 0.5);
frames_noisy = frame_wind(noisy_y, win_size, 0.5);

% Wiener of order p = 10
p = 10;

for i=1:size(frames_original, 2)
    
    rxx = xcorr(frames_noisy(:,i));
    rxd = xcorr(frames_noisy(:,i), frames_original(:,i));
    rxx = rxx(win_size:win_size+p-1);
    rxd = rxd(win_size:win_size+p-1);

    Rxx = toeplitz(rxx);
    w = pinv(Rxx, 0.0001)*rxd;  % It is the same as inv(Rxx)*rxd
    z(:, i) = filter(w, 1, frames_noisy(:,i));
end

denoised_10 = [frame_recon(z, 0.5)]';
snr_vec = [snr_vec 20*log10(norm(y)/norm(denoised_10(1:n)-y))];
audiowrite('wiener10_b.wav', denoised_10, Fs);

%------------------------------------------------------------------------
% Wiener of order p = 20
p = 20;

for i=1:size(frames_original, 2)
       
    rxx = xcorr(frames_noisy(:,i));
    rxd = xcorr(frames_noisy(:,i), frames_original(:,i));
    rxx = rxx(win_size:win_size+p-1);
    rxd = rxd(win_size:win_size+p-1);

    Rxx = toeplitz(rxx);
    w = pinv(Rxx, 0.0001)*rxd;  % It is the same as inv(Rxx)*rxd
    z(:, i) = filter(w, 1, frames_noisy(:,i));
end

denoised_20 = [frame_recon(z, 0.5)]';
snr_vec = [snr_vec 20*log10(norm(y)/norm(denoised_20(1:n)-y))];
audiowrite('wiener20_b.wav', denoised_20, Fs);
audiowrite('noisy.wav', noisy_y, Fs);

%------------------------------------------------------------------------
% Wiener of order p = 30
p = 30;

for i=1:size(frames_original, 2)
       
    rxx = xcorr(frames_noisy(:,i));
    rxd = xcorr(frames_noisy(:,i), frames_original(:,i));
    rxx = rxx(win_size:win_size+p-1);
    rxd = rxd(win_size:win_size+p-1);

    Rxx = toeplitz(rxx);
    w = pinv(Rxx, 0.0001)*rxd;  % It is the same as inv(Rxx)*rxd
    z(:, i) = filter(w, 1, frames_noisy(:,i));
end

denoised_30 = [frame_recon(z, 0.5)]';
snr_vec = [snr_vec 20*log10(norm(y)/norm(denoised_30(1:n)-y))];
audiowrite('wiener30_b.wav', denoised_30, Fs);
audiowrite('noisy.wav', noisy_y, Fs);

figure
tiledlayout(4,1);
ax1 = nexttile;
plot(ax1, 750:2750, noisy_y(750:2750))
axis([1000, 2500, -0.6, 0.6])
title(ax1, 'Noisy waveform')

ax2 = nexttile;
plot(ax2, 750:2750, denoised_10(750:2750))
axis([1000, 2500, -0.6, 0.6])
title(ax2, 'After using Wiener Filter with p=10')

ax3 = nexttile;
plot(ax3, 750:2750, denoised_20(750:2750))
axis([1000, 2500, -0.6, 0.6])
title(ax3, 'After using Wiener Filter with p=20')

ax4 = nexttile;
plot(ax4, 750:2750, denoised_30(750:2750))
axis([1000, 2500, -0.6, 0.6])
title(ax4, 'After using Wiener Filter with p=30')


figure;  plot(noisy_y(1000:2000), 'LineWidth', 2), hold on; plot(denoised_10(1000:2000), 'r'), hold off;
figure;  plot(noisy_y(1000:2000), 'LineWidth', 2), hold on; plot(denoised_30(1000:2000), 'r'), hold off;
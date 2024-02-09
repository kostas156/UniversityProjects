clear; clc; close all
%Task f
%==========================================================================
%Load wav file
[y, Fs] = audioread('guit1.wav');
n = length(y);
win_size = 256;
frames_original = frame_wind(y, win_size, 0.5);

%Wiener 2 positions
for i=1:size(frames_original, 2)
    
    rss = xcorr(frames_original(:,i));
    rxx = rss(256:256+2);
    rss = rss(257:257+2);

    Rxx = toeplitz(rxx);
    
    w = pinv(Rxx, 0.0001)*rss;  % It is the same as inv(Rxx)*rxd
    z(:, i) = filter(w, 1, frames_original(:,i));
end

pred_2 = frame_recon(z, 0.5)';
figure; plot(y(1000:2000), 'LineWidth', 2); hold on; plot(pred_2(1000:2000), 'r'), hold off;
title("Wiener Filter with 2 places prediciton");

%Wiener 10 positions
for i=1:size(frames_original, 2)
    
    rss = xcorr(frames_original(:,i));
    rxx = rss(256:256+10);
    rss = rss(257:257+10);

    Rxx = toeplitz(rxx);
    
    w = pinv(Rxx, 0.0001)*rss;  % It is the same as inv(Rxx)*rxd
    z(:, i) = filter(w, 1, frames_original(:,i));
end

pred_10 = frame_recon(z, 0.5)';
figure; plot(y(1000:2000), 'LineWidth', 2), hold on; plot(pred_10(1000:2000), 'r'), hold off;
title("Wiener Filter with 10 places prediciton");

%Wiener 15 positions
for i=1:size(frames_original, 2)
    
    rss = xcorr(frames_original(:,i));
    rxx = rss(256:256+15);
    rss = rss(257:257+15);

    Rxx = toeplitz(rxx);
    
    w = pinv(Rxx, 0.0001)*rss;  % It is the same as inv(Rxx)*rxd
    z(:, i) = filter(w, 1, frames_original(:,i));
end

pred_15 = frame_recon(z, 0.5)';
figure; plot(y(1000:2000), 'LineWidth', 2), hold on; plot(pred_15(1000:2000), 'r'), hold off;
title("Wiener Filter with 15 places prediciton");

snr_vec = [20*log10(norm(y(2:n))/norm(pred_2(1:n-1)-y(2:n))), 20*log10(norm(y(2:n))/norm(pred_10(1:n-1)-y(2:n))), 20*log10(norm(y(2:n))/norm(pred_15(1:n-1)-y(2:n)))];

audiowrite('wiener2_f.wav', pred_2, Fs);
audiowrite('wiener10_f.wav', pred_10, Fs);
audiowrite('wiener15_f.wav', pred_15, Fs);
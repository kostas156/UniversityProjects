clear; clc; close all;
%Task e
%==========================================================================
%Load wav file
[y, Fs] = audioread('guit1.wav');
noisy_y = audioread('noisy.wav');
n = length(y);

snr_vec = 20*log10(norm(y)/norm(noisy_y-y));
win_size = 256;

frames_noisy = frame_wind(noisy_y, win_size, 0.5);

% Wiener of order p = 10
p = 10;
rxx = xcorr(noisy_y);
rxx = rxx(n:n+p-1);
Rxx = toeplitz(rxx);

for i=1:size(frames_noisy, 2)
    if mean(frames_noisy(:,i).^2)< 0.0001
        rnoise = xcorr(frames_noisy(:,i));
        rnoise = rnoise(win_size:win_size+p-1);

        rxd_noise = rnoise-rnoise;
        rxd = rxx-rnoise;

        w_noise = pinv(Rxx,0.0001)*rxd_noise;
        w = pinv(Rxx,0.0001)*rxd;

        z(:, i) = filter(w_noise, 1, frames_noisy(:,i));
    else    
        z(:, i) = filter(w, 1, frames_noisy(:,i));
    end
end

denoised_10 = frame_recon(z, 0.5)';
denoised_10 = denoised_10(1:140278);
snr_vec = [snr_vec 20*log10(norm(y)/norm(denoised_10-y))];
figure;  plot(noisy_y(1:2000), 'LineWidth', 2), hold on; plot(denoised_10(1:2000), 'r'), hold off; title("P = 10");
audiowrite('wiener10_e.wav', denoised_10, Fs);

%--------------------------------------------------------------------------
% Wiener of order p = 20
p = 20;


for i=1:size(frames_noisy, 2)
    if mean(frames_noisy(:,i).^2)< 0.0001
        rnoise = xcorr(frames_noisy(:,i));
        rnoise = rnoise(win_size:win_size+p-1); 
        
        rxx = xcorr(frames_noisy(:,i));
        rxx = rxx(win_size:win_size+p-1);
        Rxx = toeplitz(rxx);
        rxd = rxx-rnoise; 

        w_noise = pinv(Rxx,0.0001)*rxd;
        w = pinv(Rxx,0.0001)*rxd;

        z(:, i) = filter(w_noise, 1, frames_noisy(:,i));
    else
        rxx = xcorr(frames_noisy(:,i));
        rxx = rxx(win_size:win_size+p-1);
        Rxx = toeplitz(rxx);
        rxd = rxx-rnoise;
        w = pinv(Rxx,0.0001)*rxd;
        z(:, i) = filter(w, 1, frames_noisy(:,i));
    end
end

denoised_20 = frame_recon(z, 0.5)';
denoised_20 = denoised_20(1:140278);
snr_vec = [snr_vec 20*log10(norm(y)/norm(denoised_20-y))];
figure;  plot(noisy_y(1:2000), 'LineWidth', 2), hold on; plot(denoised_20(1:2000), 'r'), hold off; title("P = 20");
audiowrite('wiener20_e.wav', denoised_20, Fs);

%--------------------------------------------------------------------------
% Wiener of order p = 30
p = 30;
rxx = xcorr(noisy_y);
rxx = rxx(n:n+p-1);
Rxx = toeplitz(rxx);

for i=1:size(frames_noisy, 2)
    if mean(frames_noisy(:,i).^2)< 0.0001
        rnoise = xcorr(frames_noisy(:,i));
        rnoise = rnoise(win_size:win_size+p-1); 
        
        rxd_noise = rnoise-rnoise; 
        rxd = rxx-rnoise;

        w_noise = pinv(Rxx,0.0001)*rxd_noise;
        w = pinv(Rxx,0.0001)*rxd;

        z(:, i) = filter(w_noise, 1, frames_noisy(:,i));
    else    
        z(:, i) = filter(w, 1, frames_noisy(:,i));
    end
end

denoised_30 = frame_recon(z, 0.5)';
denoised_30 = denoised_30(1:140278);
snr_vec = [snr_vec 20*log10(norm(y)/norm(denoised_30-y))];
figure;  plot(noisy_y(1:2000), 'LineWidth', 2), hold on; plot(denoised_30(1:2000), 'r'), hold off; title("P = 30");
audiowrite('wiener30_e.wav', denoised_30, Fs);
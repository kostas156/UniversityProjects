clear; clc; close all
%Task d
%Load wav files
[y, Fs] = audioread('guit1.wav');
white_noise = audioread('white_noise.wav');
noisy_y = audioread('noisy.wav');
n1 = 800;
n2 = length(y);
snr_vec = 20*log10(norm(y)/norm(noisy_y-y));

noisy_est = noisy_y(1:800);

%Wiener order p=10
p=10;
rnoise = xcorr(noisy_est);
rxx = xcorr(noisy_y);
rnoise = rnoise(n1:n1+p-1); %rnn
rxx = rxx(n2:n2+p-1); %rxx
rxd = rxx-rnoise; %rxd

Rxx = toeplitz(rxx);
w = Rxx\rxd;

z10 = filter(w, 1, noisy_y);
snr_vec = [snr_vec 20*log10(norm(y)/norm(z10-y))];
audiowrite('wiener10_d.wav', z10, Fs);


%Wiener order p=20
p = 20;
rnoise = xcorr(noisy_est);
rxx = xcorr(noisy_y);
rnoise = rnoise(n1:n1+p-1); %rnn
rxx = rxx(n2:n2+p-1); %rxx
rxd = rxx-rnoise; %rxd

Rxx = toeplitz(rxx);
w = Rxx\rxd;


z20 = filter(w, 1, noisy_y);
snr_vec = [snr_vec 20*log10(norm(y)/norm(z20-y))];
audiowrite('wiener10_d.wav', z20, Fs);

%Wiener order p=30
p = 30;
rnoise = xcorr(noisy_est);
rxx = xcorr(noisy_y);
rnoise = rnoise(n1:n1+p-1); %rnn
rxx = rxx(n2:n2+p-1); %rxx
rxd = rxx-rnoise; %rxd

Rxx = toeplitz(rxx);
w = Rxx\rxd;

z30 = filter(w, 1, noisy_y);
snr_vec = [snr_vec 20*log10(norm(y)/norm(z30-y))];
audiowrite('wiener10_d.wav', z30, Fs);

figure;  plot(noisy_y(1:2000), 'LineWidth', 2), hold on; plot(z10(1:2000), 'r'), hold off; title('P = 10');
figure;  plot(noisy_y(1:2000), 'LineWidth', 2), hold on; plot(z20(1:2000), 'r'), hold off; title('P = 20');
figure;  plot(noisy_y(1:2000), 'LineWidth', 2), hold on; plot(z30(1:2000), 'r'), hold off; title('P = 30');
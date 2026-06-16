# Audio Denoising & Linear Prediction using Wiener Filters (DSP)

This repository contains the source code, audio files, and the technical report for the Optional Term Project of the **Digital Signal Processing** course at the Department of Electrical and Computer Engineering (DUTH). The project focuses on designing and benchmark testing optimal **Wiener Filters** in MATLAB to suppress Additive White Gaussian Noise (AWGN) from audio signals and execute multi-step linear signal prediction.

## 📝 Features & Task Descriptions

The project is structured around 6 core experimental tasks (Tasks A through F), shifting from stationary global filtering to dynamic, frame-based short-time signal processing.

### 🎛️ Signal Preparation
* **`Noisy_wave_creation.m`:** Initializes the pipeline by adding reproducible White Gaussian Noise ($\sigma = 0.01$) to the clean `guit1.wav` input, writing out the degraded baseline `noisy.wav`.

### 📑 Task Layout & Implementations
* **Task A: Global Optimal Filtering (`optional_project_a.m`)**
  * Computes the global autocorrelation ($R_{xx}$) and cross-correlation ($R_{xd}$) matrices over the entire length of the clean and noisy signals.
  * Solves the Wiener-Hopf equations via Toeplitz matrix inversion for filter orders $p=10$ and $p=20$ to denoise the audio track.
* **Task B: Short-Time Frame-Based Denoising (`optional_project_b.m`)**
  * Breaks down the stationary assumption by splitting the audio into overlapping frames (256-sample window, $50\%$ overlap) using a Hanning window (`frame_wind.m`).
  * Computes local correlation matrices per frame and reconstructs the continuous denoised audio stream via Overlap-Add framing (`frame_recon.m`) for filter orders $p=10, 20, 30$.
* **Task C: White Noise Auto-correlation (`optional_project_c.m`)**
  * Evaluates the behavior of the Wiener filter when the input is purely white noise, verifying the mathematical properties of the estimated impulse response against zero-mean constraints.
* **Task D: Noise Estimation from Silent Intervals (`optional_project_d.m`)**
  * Simulates realistic operational conditions where the original clean signal is unavailable. Estimates noise statistics ($R_{nn}$) strictly from the initial unvoiced/silent interval (first 800 samples) of the noisy track to isolate $R_{xd} = R_{xx} - R_{nn}$.
* **Task E: Dynamic Frame-Based Noise Estimation (`optional_project_e.m`)**
  * Combines frame-based processing with unvoiced noise estimation. Evaluates energy thresholds per frame to dynamically update noise properties during low-energy gaps, enhancing localized SNR gains.
* **Task F: Linear Prediction Model (`optional_project_f.m`)**
  * Modifies the Wiener-Hopf formulation to perform multi-step forward linear signal prediction ($2$, $10$, and $15$ sample placements ahead) using clean signal histories.

## 📊 Directory Contents
* **MATLAB Scripts (`.m`):** Core task solvers (`optional_project_a.m` to `_f.m`), data generator (`Noisy_wave_creation.m`), and windowing utilities (`frame_wind.m`, `frame_recon.m`).
* **Audio Artifacts (`.wav`):** Original (`guit1.wav`), corrupted (`noisy.wav`), and recovered outputs across different filter configurations (e.g., `wiener10_a.wav`, `wiener30_b.wav`).
* **`Αναφορά Προεραιτικής Εργασίας Ιατρού Κωνσταντίνος 58071.pdf`:** The official comprehensive engineering report featuring waveform comparisons, SNR vector statistics, block diagrams, and theoretical breakdowns.

## 🛠️ Performance Benchmarks (SNR Evolution)
Clustering quality and denoising efficiency are strictly evaluated using the Signal-to-Noise Ratio (SNR) metric. As detailed in the project report:
* **Global vs. Local:** Frame-based short-time configurations (Task B) provide sharper auditory restoration and higher SNR improvements compared to global estimators (Task A).
* **Order Scaling:** Increasing the filter order $p$ consistently scales down the mean squared error (MSE), yielding maximum performance values at $p=30$.

## 💻 How to Run
1. Open MATLAB and set this directory as your active working folder.
2. Run the noise generator script first to initialize the audio files:
   ```matlab
   Noisy_wave_creation
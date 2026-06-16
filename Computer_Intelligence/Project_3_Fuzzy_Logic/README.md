# Fuzzy Cruise Control System (Fuzzy Logic Inference)

This repository contains the **Fuzzy Logic Inference System (FIS)** implementation developed in **MATLAB** to simulate an automated vehicle speed stabilization system (Cruise Control). This project was developed as part of the 3rd assignment for the **Computational Intelligence** course at the Department of Electrical and Computer Engineering of the Democritus University of Thrace (DUTH).

## 📝 Problem Description
The primary objective of this system is to dynamically maintain a vehicle's cruising speed at a steady target of **120 km/h**. By monitoring the real-time velocity and acceleration of the vehicle, the fuzzy controller computes the exact force modifications required by the mechanical sub-systems (throttle adjustments or braking power) to maintain smooth, automated motion.

## 🛠️ System Architecture & Parameters
The system was engineered utilizing the native **Fuzzy Logic Designer** toolbox in MATLAB and is built upon a Mamdani-style inference model mapping two inputs to a single system output.

### 1. Input Variables
* **Current Speed (Speed):** Evaluated over a operational universe of discourse bounded between $[0, 240]$ km/h. It is partitioned into 3 localized fuzzy membership sets:
  * *Slow:* Modeled via a two-parameter Gaussian composite curve function (`gauss2mf`).
  * *Medium:* Modeled using a standard symmetrical Gaussian curve function (`gaussmf`), precisely centered around the target baseline of 120 km/h.
  * *Fast:* Modeled via a two-parameter Gaussian composite curve function (`gauss2mf`).
* **Current Acceleration (Acceleration):** Evaluated over a physical range of $[-10, 10]$ $m/s^2$. It is partitioned into 3 localized fuzzy membership sets:
  * *Negative:* Modeled using a two-parameter Gaussian composite function (`gauss2mf`).
  * *Zero:* 🔬 *Design Optimization:* This set utilizes a strict, narrow **Triangular Membership Function (`trimf`)** instead of a smooth Gaussian profile. This design choice guarantees maximum tracking resolution, preventing systemic oscillations and ensuring instant, sharp stabilizing control when the vehicle's acceleration passes zero.
  * *Positive:* Modeled using a two-parameter Gaussian composite function (`gauss2mf`).

### 2. Output Variable
* **Mechanical Action (Break_Accelerator):** Governs the continuous actuator control domain mapped within the boundaries of $[-0.853, 0.853]$ (empirically calibrated so that the post-defuzzification crisp outputs translate smoothly into normalized physical bounds of $-0.5$ for maximum braking and $0.5$ for maximum acceleration). It is broken down into 3 discrete actions:
  * *Break (Braking Force):* Modeled using a `gauss2mf` membership function.
  * *Nothing (Idle state):* Modeled using a `gaussmf` membership function.
  * *Accelerate (Throttle Expansion):* Modeled using a `gauss2mf` membership function.

## 📜 Fuzzy Rule Base
The deterministic operational behavior of the Cruise Control loop is governed by a compact and robust set of linguistic rules:
1. **IF** *Speed* is *Slow*, **THEN** apply *Accelerate*.
2. **IF** *Speed* is *Fast*, **THEN** apply *Break*.
3. **IF** *Speed* is *Medium* **AND** *Acceleration* is *Positive*, **THEN** apply *Break* (Pre-emptive braking to prevent exceeding the 120 km/h target threshold).
4. **IF** *Speed* is *Medium* **AND** *Acceleration* is *Negative*, **THEN** apply *Accelerate* (Incremental throttle activation to counteract speed drops).
5. **IF** *Speed* is *Medium* **AND** *Acceleration* is *Zero*, **THEN** do *Nothing* (Ideal steady-state stabilization).

## 📊 Directory Contents
* **`CruiseControl.fis`**: The ready-to-run Fuzzy Inference System parameter database schema containing all input/output limits, membership weights, and logical junctions. Can be imported directly into MATLAB.
* **`Υπολογιστική Νοημοσύνη Εργασία 3.docx`**: The official technical report outlining graphic representations of the input spaces, linguistic combinations, truth matrices, and the resulting 3D operational control surface map.

## 💻 How to Run
1. Launch MATLAB on your computer.
2. Open the fuzzy engine GUI by typing the following command in the Command Window:
   ```matlab
   fuzzy
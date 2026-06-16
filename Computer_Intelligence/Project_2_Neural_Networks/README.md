# Function Approximation using Artificial Neural Networks (MLP)

This repository contains the **Multi-layer Perceptron (MLP)** Neural Network implementation developed in **MATLAB** to solve a non-linear function approximation (regression) problem. This project was developed as part of the 2nd assignment for the **Computational Intelligence** course at the Department of Electrical and Computer Engineering of the Democritus University of Thrace (DUTH).

## 📝 Problem Description
The objective of this assignment is to train a feedforward neural network capable of mapping and approximating a non-linear mathematical function of two variables with high precision:

$$f(x,y) = 0.7 \cdot e^{\cos(\pi x)} + 0.3 \cdot \cos(2\pi y)$$

where the input variables are bounded within the range $x, y \in [-4, 4]$. A total of 900 samples generated from a $30 \times 30$ grid layout (`meshgrid`) were utilized to train, validate, and evaluate the network's predictive capabilities.

## 🛠️ Network Architecture & Hyperparameters
The structural properties and training constraints of the deep network are fully configured inside **`neuralNetProject.m`**:

* **Topology (Layer Structure):** A deep feedforward structure consisting of 4 Hidden Layers and 1 Output Layer, mapped out as: `[42, 28, 13, 7, 1]`.
* **Activation Functions:** * *Hidden Layers:* Hyperbolic Tangent Sigmoid (`tansig`) and Logistic Sigmoid (`logsig`) functions.
  * *Output Layer:* Pure Linear (`purelin`) activation function.
* **Training Algorithm:** Gradient Descent (`traingd`) with a fixed learning rate set at $\eta = 0.01$.
* **Performance Metric:** Mean Squared Error (MSE) targeting an optimization goal of `1e-4` over a maximum parameter space of 175,000 epochs.
* **Data Splitting Strategy:** Randomized sample partitioning (`dividerand`) assigned as:
  * **80%** for the Training set
  * **10%** for the Validation set
  * **10%** for the Test set

## 🧠 Design Insights & Optimization
* **Overfitting Prevention:** The Gradient Descent algorithm (`traingd`) was intentionally selected over the faster Levenberg-Marquardt (`trainlm`) optimizer. Initial test iterations showed that Levenberg-Marquardt suffered from extreme, premature overfitting very early in training when operating across large epoch boundaries. 
* **Early Stopping Framework:** Configured with a `max_fail = 25` threshold parameter. This acts as a circuit breaker that safely terminates training if the validation error fails to improve for 25 consecutive evaluation cycles, preserving the model's generalization capabilities.
* **Statistical Performance Evaluation:** To determine the true average prediction error per point while eliminating distortions from extreme outliers, the `trimmean` function was applied to the absolute error vector, yielding a highly stable mean error profile of approximately `-0.072`.

## 📊 Directory Contents
* **`neuralNetProject.m`**: The complete MATLAB source code handling grid vector generation, multi-layer network configuration, early-stopped training execution, and error tracking computations.
* **`Υπολογιστική Νοημοσύνη Εργασία 2.pdf`**: The official analytical technical report containing internal structural schematics, 3D surface plot renderings contrasting the target vs. predicted output space, and performance error distributions.

## 💻 How to Run
1. Launch MATLAB and open this directory as your active Current Folder workspace.
2. Run the main automation script from the Command Window to initialize training and plot the 3D surface comparisons:
   ```matlab
   neuralNetProject
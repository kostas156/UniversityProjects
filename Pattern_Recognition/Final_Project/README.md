## Pattern Recognition - Final Term Project

This section contains the comprehensive **Final Term Project** for the Pattern Recognition course. The project is split into two distinct parts: an Image Classification problem utilizing Deep Learning (CNNs & Transfer Learning) and a Biological Binding Affinity Prediction problem using advanced Machine Learning models, Dimensionality Reduction (PCA), and Ensemble methods.

## 📚 Structure & Task Descriptions

The project is implemented across 2 core Jupyter Notebooks (`.ipynb`), backed by the complete dataset predictions, the official technical report, and the final presentation slides.

### 📑 Part 1: Face Mask Detection & Compliance (Computer Vision)
* **File:** `Final_Project_1_58071.ipynb`
* **Dataset:** `Mask_DB` (1,044 images *with_mask*, 1,044 images *without_mask*, and 56 images of *mask_incorrect_use*).
* **Implementation & Architecture:**
  * **Custom CNNs:** Designed and trained two scratch Convolutional Neural Network architectures from the ground up, utilizing Layer normalization, ReLU, Max Pooling, and Dropout to prevent overfitting.
  * **Transfer Learning:** Integrated and fine-tuned a pre-trained **ResNet-18** network, tracking accuracy and cross-entropy loss variations.
  * **Edge-Case Evaluation:** Challenged the models against the tricky *incorrect_mask_use* class. Handled class shifts by shifting the classification thresholds (tuning up to `0.95` and `0.999998`) to capture non-compliant behavior effectively.

### 📑 Part 2: Chemical Molecule Binding Affinity Prediction (Bioinformatics)
* **File:** `Final_Project_2_58071.ipynb`
* **Objective:** Predict the degree of binding affinity between chemical molecules and biological receptors (crucial for pharmacology and drug discovery).
* **Implementation:**
  * **Data Preprocessing & Dimensionality Reduction:** Cleaned and scaled high-dimensional molecular descriptors. Applied **Principal Component Analysis (PCA)** to reduce the feature space to 426 dominant Principal Components.
  * **Hyperparameter Optimization:** Conducted an automated **Bayesian Search** to select the ultimate layer topology and training parameters for a deep Neural Network.
  * **Advanced Modeling:** Evaluated and tuned Multi-Layer Perceptrons and **Support Vector Machines (SVM)** to compare individual regression/classification boundaries.
  * **Ensemble Methods:** Built a combined **Voting/Ensemble Classifier** utilizing a soft/hard confidence voting mechanism to maximize accuracy. Performance was thoroughly evaluated via **AUC-ROC Curves**.

## 📊 Directory Contents
* **`Final_Project_1_58071.ipynb`:** Jupyter Notebook covering the full image processing and Deep Learning workflow.
* **`Final_Project_2_58071.ipynb`:** Jupyter Notebook containing feature selection, Bayesian search, and ensemble modeling.
* **`test_predictions.csv`:** Output file holding the final calculated test predictions.
* **`Τελική Εργασία Αναφορά 58071.pdf`:** The exhaustive technical report featuring training curves, network topologies, ROC curves, and detailed mathematical insights.
* **`Τελική Εργασία Παρουσίαση 58071.pptx`:** The official presentation slides capturing key findings, benchmarking statistics, and model comparisons.

## 🛠️ Requirements & Tools
* `Python 3`
* `PyTorch` / `TensorFlow` (Deep Learning & Transfer Learning)
* `scikit-learn` (SVM, PCA, Ensemble methods, Bayesian Optimization, metrics)
* `numpy` & `pandas` (Data processing)
* `matplotlib` & `seaborn` (ROC curves, confusion matrices, loss graphs)

## 💻 How to Run
1. Install dependencies:
   ```bash
   pip install torch torchvision numpy pandas scikit-learn matplotlib seaborn
# Clustering, Feature Selection (PCA) & Multidimensional Scaling (MDS)

This sub-project contains the code, datasets, and technical report for the **3rd Assignment** of the **Pattern Recognition** course at the Department of Electrical and Computer Engineering (DUTH). The project focuses on unsupervised learning techniques, evaluation of clustering density, feature importance analysis via PCA, and map reconstruction using Multidimensional Scaling (MDS).

## 📚 Structure & Task Descriptions

The project is divided into 4 Jupyter Notebooks (`.ipynb`), structured around specific tasks, and is accompanied by the comprehensive theoretical report.

### 📑 Task 1 & 2: Seed Clustering Analysis (K-Means & Agglomerative)
* **Files:** `Project3_1_58071.ipynb` and `Project3_2_58071.ipynb`
* **Dataset:** `seeds_dataset.txt` (Morphological measurements of 210 seeds from three wheat varieties: Kama, Rosa, and Canadian).
* **Implementation & Evaluation:**
  * **Distance Matrix Visualization:** Calculation and visualization of distance matrices using both Euclidean and Cosine metrics to identify class separability.
  * **Density Evaluation:** Computation of the Silhouette Coefficient to determine the structural density of the clusters.
  * **Clustering Algorithms:** Application of **K-Means** and **Hierarchical Agglomerative Clustering** (examining both Ward's linkage and Average linkage across Euclidean/Cosine spaces).
  * **Performance Benchmarking:** Ground truth comparison and clustering quality evaluation using the **Rand Index**.

### 📑 Task 3: Feature Selection & Dimensionality Reduction via PCA
* **File:** `Project3_3_58071.ipynb`
* **Objective:** Determine feature importance and select the most dominant components of the Seeds dataset.
* **Implementation:**
  * Application of Principal Component Analysis (PCA) to find the minimum number of components needed to explain **90%** and **95%** of the dataset's total variance.
  * Selection of the two most contributing features versus the two least contributing features based on eigenvector weights.
  * Generation of 2D scatter plots mapping out the samples to visually contrast the separating power of dominant vs. weak features.

### 📑 Task 4 & Bonus: Geographic Reconstruction using Multidimensional Scaling (MDS)
* **File:** `Project3_4_58071.ipynb`
* **Datasets:** `Distance_Matrix_world.txt`, `City_names_world.txt`, `Distance_Matrix_US.txt`, `City_names_US.txt`
* **Objective:** Reconstruct 2D and 3D map coordinates of cities relying solely on pairwise air distance matrices (Statute Miles).
* **Implementation:**
  * **World Cities Mapping:** Constructing a centralized Gram matrix from the distances, calculating its eigenvalues/eigenvectors, and reconstructing coordinates. Analysis explains why a 3D embedding is physically required due to the Earth's curvature.
  * **US Cities Mapping (Bonus):** Re-applying MDS on United States city distances. The analysis demonstrates how reducing the geographic scale minimizes the effect of planetary curvature, allowing an accurate map reconstruction in just 2 dimensions.
  * **Visualization:** Custom 2D/3D scatter plots with annotated city names, correctly handled with axis flips to match true geographical orientations.

## 📊 Directory Contents
* **`.ipynb` files:** Python source notebooks using standard data science stacks.
* **`.txt` files:** Raw distance matrices and text files containing city/dataset labels.
* **`Αναφορά Εργασίας 3 58071.pdf`:** The official technical report outlining mathematical backgrounds, eigenvalue lists, Silhouette scores, and the final reconstructed maps.

## 🛠️ Requirements & Tools
* `Python 3`
* `numpy` & `pandas` (Matrix operations and data handling)
* `scikit-learn` (KMeans, AgglomerativeClustering, PCA, and metrics)
* `matplotlib` & `seaborn` (2D and 3D annotations and plotting)

## 💻 How to Run
1. Install dependencies:
   ```bash
   pip install numpy pandas scikit-learn matplotlib seaborn